<?php

namespace App\Controller;

use App\Entity\ClassRoom;
use App\Form\ClassRoomType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassRoomController extends AbstractController
{
    /**
     * @Route("/classroom", name="class_room")
     */
    public function index(): Response
    {
        return $this->render('class_room/index.html.twig', [
            'controller_name' => 'ClassRoomController',
        ]);
    }

    /**
     * @Route("/list", name="listClass")
     */
    public function list(){
        $entityManager= $this->getDoctrine();
        $list= $entityManager->getRepository(ClassRoom::class)
            ->findAll();
        return $this->render('class_room/list.html.twig',[
            'list'=>$list
        ]);
    }


    /**
     * @Route("/add", name="addPage")
     */
    public function addClassRoom(Request $request){
        $c = new ClassRoom();
        $form= $this->createForm(ClassRoomType::class, $c);
        $form= $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($c);
            $em->flush();
            return $this->redirectToRoute('listClass');
        }
        $action="Modifier";
        return $this->render('class_room/add.html.twig',[
             'form'=>$form->createView(), 'action'=>$action
        ]);
    }

    /**
     * @Route("/deleteClass/{id}",name="deleteClassPage")
     */
    public function delete($id){
        //1.Création d'une instance l'entity Manager
       $entityManager= $this->getDoctrine()->getManager();
       //2.Préparer l'objet
        $object= $entityManager->getRepository(ClassRoom::class)->find($id);
        $entityManager->remove($object);
        $entityManager->flush();
        return $this->redirectToRoute("listClass");
    }

    /**
     * @Route("/update/{id}", name="UpdateClassPage")
     */
    public function update($id, Request $request){
        //0.prépaper l'entity Manger
        $em= $this->getDoctrine()->getManager();
        //préparation de l'objet
        $objet= $em->getRepository(ClassRoom::class)->find($id);
        //préparer le formulaire
        $form= $this->createForm(ClassRoomType::class,$objet);
        $form= $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $em->flush();
            return $this->redirectToRoute("listClass");
        }
        //afficher le formulaire
        $action="Modifier";
        return $this->render("class_room/add.html.twig",[
            'form'=>$form->createView(), 'action'=>$action
        ]);
    }
}
