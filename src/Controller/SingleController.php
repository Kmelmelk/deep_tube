<?php

namespace App\Controller;

use App\Entity\Musique;
use App\Form\MusiqueType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SingleController extends AbstractController
{
    /**
     * @Route("/single", name="single")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Musique::class);
        $musiques = $repo->findAll();

        return $this->render('single/index.html.twig', [
            'controller_name' => 'SingleController',
            'musiques' => $musiques
        ]);
    }

}