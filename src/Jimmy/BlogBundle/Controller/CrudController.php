<?php

namespace Jimmy\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Jimmy\BlogBundle\Entity\Article;
use Jimmy\BlogBundle\Form\ArticleForm;
use Symfony\Component\HttpFoundation\Request;

class CrudController extends Controller
{
    /**
     * @Route("/new")
     */
    public function newAction(Request $request)
    {
        $article = new Article();

        $form = $this->createForm(ArticleForm::class, $article, array( 'action' => 'new'));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $username = $user->getUsername();
            $article->setAuthor($username);
            $article->setDate(new \DateTime());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
        }

        return $this->render('JimmyBlogBundle:Crud:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'create_new_post'
        ));
    }
    
    /**
     * @Route("/edit/{articleId}", name="editpost")
     */
    public function editAction($articleId, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('JimmyBlogBundle:Article')->find($articleId);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id ' . $articleId
            );
        }

        $form = $this->createForm(ArticleForm::class, $article, array( 'action' => $this->generateUrl('editpost', array('articleId' => $articleId) )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $username = $user->getUsername();
            
            $article = $form->getData();
            $article->setAuthor($username);
            $article->setDate(new \DateTime());
            
            $em->flush();

            return $this->redirectToRoute('viewpost', ['postid' => $article->getUrl()]);
        }

        return $this->render('JimmyBlogBundle:Crud:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

    /**
     * @Route("/delete/{articleId}", name="deletepost")
     */
    public function deleteAction($articleId)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('JimmyBlogBundle:Article')->find($articleId);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id ' . $articleId
            );
        }
        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }


}
