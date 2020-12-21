<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\Translator;

class TranslationController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(TranslatorInterface $translator): Response
    {


		 $translator = new Translator('fr_FR');
		$translator->addResource('array', [
		    'SEARCH FOR A BOOK !' => 'CHERCHER UN LIVRE !',
		], 'fr_FR');

        return $this->render('home/index.html.twig', [
            'controller_name' => 'TranslationController',
        ]);
    }
}
