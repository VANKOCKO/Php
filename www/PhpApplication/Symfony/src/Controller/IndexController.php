<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author vankocko
 */
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller{
    
     /**
     * @Route("/home")
     */
     public function number()
     {
         $number = mt_rand(0, 100);

         return $this->render('index.html.twig', array(
            'number' => $number,
        ));
     }
  
}
