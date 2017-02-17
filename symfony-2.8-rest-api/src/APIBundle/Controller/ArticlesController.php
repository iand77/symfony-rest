<?php

namespace APIBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use APIBundle\Entity\Article;
use Doctrine\ORM\Query;
use Doctrine\ORM\NoResultException;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends FOSRestController
{


  /**
   * TODO: add pagination
   *
   * @return Article[]
   */
  public function getArticlesAction()
  {
      $articles = $this
          ->getDoctrine()
          ->getRepository('APIBundle:Article')
          ->findAll();

      return $articles;
  }

    /**
     * Note: here the name is important
     * get => the action is restricted to GET HTTP method
     * Article => (without s) generate /articles/SOMETHING
     * Action => standard things for symfony for a controller method which
     *           generate an output
     *
     * it generates so the route GET .../articles/{id}
     */
    public function getArticleAction($id)
    {
      /*
      $article = new Article("title $id", "body $id");

        $manager = $this->getDoctrine()->getManager();
        // persist ONLY add the object to the list of object to
        // save
        $manager->persist($article);
        // only flush will actually save in database, this in order
        // to make it possible to save a lot of object in only one flush
        // (which is a LOT faster than flushing one by one
        $manager->flush();

        return $article;
        */

          $article = $this
              ->getDoctrine()
              ->getRepository('APIBundle:Article')
              ->find($id);

              if (is_null($article)) {
                throw $this->createNotFoundException('No such article');
            }

            return new View($article, Response::HTTP_OK);
    }

}
