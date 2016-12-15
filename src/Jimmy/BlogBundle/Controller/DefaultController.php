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
        $articles = $this->getDoctrine()
        	->getRepository('JimmyBlogBundle:Article')
        	->findBy(
                array(),
                array(),
                10);
        return $this->render('JimmyBlogBundle:Default:index.html.twig'
        	,array('articles' => $articles, )
        );
    }

    /**
     * Posts an action.
     *
     * @Route("/post/{postid}", name="viewpost")
     */
    public function postAction($postid)
    {
        $article = $this->getDoctrine()
        	->getRepository('JimmyBlogBundle:Article')
            ->findOneBy(array('url' => $postid));
         
        if (!$article) {
	        throw $this->createNotFoundException(
	            'No article found for id '.$postid
	        );
	    }

        return $this->render(
        	'JimmyBlogBundle:Default:post.html.twig'
        	,array(
        		'article' => $article
                ,'edit_url' => $this->generateUrl('editpost', array('articleId' => $article->getId()))
                ,'delete_url' => $this->generateUrl('deletepost', array('articleId' => $article->getId()))
        	)
        );
    }

}
