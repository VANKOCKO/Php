<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \App\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;


/**
 * Description of ArticleController
 *
 * @author vankocko
 */


class ArticleController extends Controller {
    
    /**
     * @Route("/articles/{id}",name="article_show")
     */
    public function showAction(){  
        $article = new Article();
        $article->setTitle("Mon premier article");
        $article->setContent("Le contenue de mon article");
        $data = $this->get('jms_serializer')->serialize($article, 'json', \JMS\Serializer\SerializationContext::create()->setGroups(array('detail')));
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
   
    /**
     * @Route("/articles", name="article_create")
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        $data = $request->getContent();
        $article = $this->get('jms_serializer')->deserialize($data, 'App\Entity\Article', 'json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);
    }
}
