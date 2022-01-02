<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DemoController extends AbstractController
{

    public function index(LivreRepository $livreRepository): Response
    {
        return $this->render('index.html.twig', [
            'livres' => $livreRepository->findAll(),
        ]);
    }
}
