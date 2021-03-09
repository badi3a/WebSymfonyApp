<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');

    }

    /**
     * @Route("/club", name="Club Page")
     *
     */
    public function clubRead(){
        $nameClub= "Android Club";
        return $this->render('home/club.html.twig',array(
            'name'=>$nameClub
        ));
    }

    /**
     * @Route("/list", name="Club List Page")
     */
    public function listClub(){
        $nameClub= "Android Club";
        $tab=array(
            array('name'=>'Android Club','address'=>'Esprit Ghazela','nbr_User'=>0),
            array('name'=>'PHP Club','address'=>'Esprit Ghazela','nbr_User'=>10),
            array('name'=>'Symfony Club','address'=>'Esprit Ghazela','nbr_User'=>50)
        ) ;
         return $this->render('home/list.html.twig',array(
               'list'=>$tab
         ));
    }
}
