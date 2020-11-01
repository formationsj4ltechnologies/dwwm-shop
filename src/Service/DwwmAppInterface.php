<?php


namespace App\Service;


use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DwwmAppInterface
{
    /**
     * @var SessionInterface
     */
    private $session;
    /**
     * @var ProduitRepository
     */
    private $produitRepository;

    public function __construct(SessionInterface $session, ProduitRepository $produitRepository)
    {
        $this->session = $session;
        $this->produitRepository = $produitRepository;
    }

    public static function capitalize(string $chaine)
    {
        return ucwords(mb_strtolower(trim($chaine)));
    }

    public static function lowercase(string $chaine)
    {
        return mb_strtolower(trim($chaine));
    }

    public static function uppercase(string $chaine)
    {
        return mb_strtoupper(trim($chaine));
    }

    public static function concactene(string $prenom, string $nom)
    {
        return $prenom . " " . $nom;
    }

    /**
     * Permet de recuperer le contenu du panier
     * @return array
     */
    public function contenuDuPanier(): array
    {
        $panier = $this->session->get('panier', []);
        $contenuDuPanier = [];
        foreach ($panier as $id => $quantite) {
            $produit = $this->produitRepository->find($id);
            if ($quantite && $produit->getDispo()) {
                $contenuDuPanier[] = [
                    "quantite" => $quantite,
                    "produit" => $produit,
                    "sous_total" => $quantite * $produit->getPrix(),
                ];
            }
        }
        return $contenuDuPanier;
    }

    /**
     * Permet d'ajouter un produit au panier
     * @param int $id
     */
    public function ajouterAuPanier(int $id)
    {
        $panier = $this->session->get('panier', []);
        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }
        $this->session->set('panier', $panier);
    }

    /**
     * Permet de diminuer la quantité s'un produit du panier
     * @param int $id
     * @return int
     */
    public function diminuerQteDuPanier(int $id): int
    {
        $panier = $this->session->get('panier', []);
        if (!empty($panier[$id])) {
            $panier[$id]--;
        }
        $this->session->set('panier', $panier);
        return $panier[$id];
    }

    /**
     * Permet de diminuer la quantité s'un produit du panier
     * @param int $id
     * @return int
     */
    public function augmenterQteDuPanier(int $id): int
    {
        $panier = $this->session->get('panier', []);
        if (!empty($panier[$id])) {
            $panier[$id]++;
        }
        $this->session->set('panier', $panier);
        return $panier[$id];
    }

    /**
     * Permet de supprimer  un elament du panier
     * @param int $id
     */
    public function supprimerDuPanier(int $id)
    {
        $panier = $this->session->get('panier', []);
        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }
        $this->session->set('panier', $panier);
    }

    /**
     * @param string $imageName
     * @return string
     */
    public static function getImageUrl(string $imageName)
    {
        return "images/produits/" . $imageName;
    }
}