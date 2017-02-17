<?php

namespace APIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\FOSRestController;

class DefaultController extends FOSRestController
{
    /**
     * @Route("/api")
     */
    public function indexAction()
    {
      $data = [['user'=>'ian', 'mob'=>'Nov']]; // get data, in this case list of users.
      $view = $this->view($data, 200)
         ->setTemplate("APIBundle:Default:index.html.twig")
         ->setTemplateVar('users');

        return $this->handleView($view);


        //die('it works');
        //return $this->render('APIBundle:Default:index.html.twig');
    }
}
