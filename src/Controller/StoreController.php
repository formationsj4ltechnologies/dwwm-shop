<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StoreController
 * @package App\Controller
 * @Route("/", name="store_")
 */
class StoreController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {

        return $this->render('store/index.html.twig', [
            'titre_page' => $titrePage = "Accueil",
            'titre_section' => $titreSection = "Page accueil de la boutique",
        ]);
    }
}
