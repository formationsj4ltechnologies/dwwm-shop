<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StoreController
 * @package App\Controller
 * @Route("/", name="store_")
 */
class StoreController extends AbstractController
{
    private $produitRepository;

    public function __construct(ProduitRepository $produitRepository)
    {
        $this->produitRepository = $produitRepository;
    }

    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('store/produits.html.twig',
            [
                'titre_page' => $titrePage = "Accueil",
                'titre_section' => $titreSection = "page accueil",
                'produits' => $produits = $this->produitRepository->findAll()
            ]
        );
    }

    /**
     * @Route("/produit/{id}-{slug}", name="produit")
     * @param int $id
     * @return Response
     */
    public function produit(int $id)
    {
        return $this->render('store/produit.html.twig', [
            'titre_page' => $titrePage = "Produit",
            'titre_section' => $titreSection = "page produit",
            'produit' => $produit = $this->produitRepository->find($id)
        ]);
    }
}
