<?php

namespace App\Controller;

use App\Service\DwwmAppInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panier", name="panier_")
 */
class PanierController extends AbstractController
{
    /**
     * @var DwwmAppInterface
     */
    private $appService;

    public function __construct(DwwmAppInterface $appService)
    {
        $this->appService = $appService;
    }

    /**
     * @Route("/", name="contenu")
     */
    public function index()
    {
        $contenuDuPanier = $this->appService->contenuDuPanier();
        return $this->json(
            [
                'panier' => $contenuDuPanier
            ]);
    }

    /**
     * @Route("/ajouter/{id}", name="ajouter")
     * @param int $id
     * @return RedirectResponse
     */
    public function ajouter(int $id)
    {
        $this->appService->ajouterAuPanier($id);
        return $this->redirectToRoute("panier_contenu");
    }

    /**
     * @Route("/diminuer/{id}", name="diminuer")
     * @param int $id
     * @return RedirectResponse
     */
    public function dimunier(int $id){
        $this->appService->diminuerQteDuPanier($id);
        return $this->redirectToRoute("panier_contenu");
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     * @param int $id
     * @return RedirectResponse
     */
    public function supprimer(int $id){
        $this->appService->supprimerDuPanier($id);
        return $this->redirectToRoute("panier_contenu");
    }
}
