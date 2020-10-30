<?php

namespace App\Controller;

use App\Service\DwwmAppInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
            ]
        );
    }

    /**
     * @Route("/ajouter/{id}-{slug}", name="ajouter")
     * @param int $id
     * @param string $slug
     * @return RedirectResponse
     */
    public function ajouter(int $id, string $slug)
    {
        $this->appService->ajouterAuPanier($id);
        return $this->redirectToRoute("store_produit", ['id' => $id, 'slug' => $slug]);
    }

    /**
     * @Route("/diminuer/{id}", name="diminuer")
     * @param int $id
     * @return JsonResponse
     */
    public function dimunier(int $id)
    {
        $quantite = $this->appService->diminuerQteDuPanier($id);
        return $this->json(['quantite' => $quantite]);
    }

    /**
     * @Route("/augmenter/{id}", name="augmenter")
     * @param int $id
     * @return JsonResponse
     */
    public function augmenter(int $id)
    {
        $quantite = $this->appService->augmenterQteDuPanier($id);
        return $this->json(['quantite' => $quantite]);
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     * @param int $id
     * @return RedirectResponse
     */
    public function supprimer(int $id)
    {
        $this->appService->supprimerDuPanier($id);
        return $this->redirectToRoute("panier_contenu");
    }
}
