<?php

namespace App\Controller;

use App\Entity\Musique;
use App\Form\MusiqueType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class   HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'DeepTube',

        ]);
    }

    /**
     * @Route("/ajout", name="home_add")
     */
    public function home_add(Request $request)
    {
        $musique = new Musique();
        $form = $this->createForm(MusiqueType::class,$musique);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $musique = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($musique);
            $em->flush();
            return $this->redirectToRoute('single');
        }

        return $this->render('home/ajout.musique.html.twig' , ['form' => $form->createView()]);

    }

    /**
     * @Route("/home/remove/{id}", name="home_remove")
     */
    public function home_remove($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Musique::class);
        $musique = $repo->findOneBy(array('id' =>$id));
        $em->remove($musique);
        $em->flush();

        return $this->redirectToRoute("single");

    }
}
