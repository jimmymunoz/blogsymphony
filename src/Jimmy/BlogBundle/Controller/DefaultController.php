<?php

namespace Jimmy\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Jimmy\BlogBundle\Entity\Article;

class DefaultController extends Controller
{
	/**
	 * { function_description }
	 * @Route("/", name="homepage")
	 */
    public function indexAction()
    {
        //bin/console cache:clear
        $articles = $this->getDoctrine()
        	->getRepository('JimmyBlogBundle:Article')
            //->findAll();
        	->findBy(
                array(),
                array(),
                10);
        //var_dump($articles);
        return $this->render('JimmyBlogBundle:Default:index.html.twig'
        	,array('articles' => $articles, )
        );
    }

    /**
     * Posts an action.
     *
     * @Route("/post/{postid}", name="post")
     */
    public function postAction($postid)
    {
        $article = $this->getDoctrine()
        	->getRepository('JimmyBlogBundle:Article')
        	//->find($postid);
            ->findOneBy(array('url' => $postid));
         
        if (!$article) {
	        throw $this->createNotFoundException(
	            'No article found for id '.$postid
	        );
	    }

        return $this->render(
        	'JimmyBlogBundle:Default:post.html.twig'
        	,array(
        		'article' => $article, 
        	)
        );
    }

    /**
     * @Route("/new", name="new")
     */
    public function newAction(){
	    $em = $this->getDoctrine()->getManager();
        //for($i = 1; $i <= 10; $i++){
            $article = new Article();
            $article->setTitle("Mon {$i} article");
            $article->setAuthor("Jimmy Munoz");
            $article->setDate(new \DateTime());
            $article->setUrl("article_{$i}");
            $article->setContent("xxxxxx xxxxxx");


	    	// tells Doctrine you want to (eventually) save the Product (no queries yet)
		    $em->persist($article);

    	//}
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

	    return new Response('Saved new article with id '.$article->getId());
	    /*

		return $this->render(
        	'JimmyBlogBundle:Default:index.html.twig'
        	,array(
        	)
        );
	     */
    }

    /**
     * @Route("/edit", name="edit")
     */
    public function editAction(){

		return $this->render(
        	'JimmyBlogBundle:Default:index.html.twig'
        	,array(
        	)
        );
    }

    /**
     * @Route("/delete", name="delete")
     */
    public function deleteAction(){

		return $this->render(
        	'JimmyBlogBundle:Default:index.html.twig'
        	,array(
        	)
        );
    }

}
