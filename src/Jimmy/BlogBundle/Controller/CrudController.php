<?php

namespace Jimmy\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CrudController extends Controller
{
    /**
     * @Route("/newPost")
     */
    public function newPostAction()
    {
        return $this->render('JimmyBlogBundle:Crud:new_post.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/getAllPost")
     */
    public function getAllPostAction()
    {
        return $this->render('JimmyBlogBundle:Crud:get_all_post.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/getPost")
     */
    public function getPostAction()
    {
        return $this->render('JimmyBlogBundle:Crud:get_post.html.twig', array(
            // ...
        ));
    }

}
