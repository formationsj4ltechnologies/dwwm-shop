<?php

namespace App\Controller;

use App\Service\DwwmAppInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
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
     * @return JsonResponse
     */
    public function supprimer(int $id)
    {
        $this->appService->supprimerDuPanier($id);
        return $this->json(["resultat" => "OK"]);
    }

    /**
     * @Route("/checkout", name="checkout")
     * @return Response
     */
    public function checkout()
    {
        $panier = $this->appService->contenuDuPanier();
        $total = 0;
        foreach ($panier as $id => $article) {
            $total += $article['sous_total'];
        }

        return $this->render('panier/checkout.html.twig', [
            'titre_page' => $titrePage = "Checkout",
            'titre_section' => $titreSection = "valider le panier",
            'articles' => $this->appService->contenuDuPanier(),
            'total'=>$total,
        ]);
    }
}
