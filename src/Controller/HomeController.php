<?php

namespace App\Controller;


use App\Repository\WilderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(WilderRepository $wilderRepository): Response
    {
        $wilders = $wilderRepository->findAllByName();
        return $this->render('home/index.html.twig', [
            'wilders' => $wilders,
        ]);
    }
}
