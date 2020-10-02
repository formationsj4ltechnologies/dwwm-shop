<?php

namespace App\Controller\Admin;

use App\Entity\Boitier;
use App\Entity\CarteGraphique;
use App\Entity\Categorie;
use App\Entity\Connectique;
use App\Entity\Ecran;
use App\Entity\Marque;
use App\Entity\Memoire;
use App\Entity\Processeur;
use App\Entity\Produit;
use App\Entity\Stockage;
use App\Entity\User;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class DashboardController
 * @package App\Controller\Admin
 * @IsGranted("ROLE_ADMIN")
 * @Route("/admin", name="bo_")
 */
class DashboardController extends AbstractDashboardController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render("bundles/EasyAdminBundle/welcome.html.twig", [
            "titre_page" => $titrePage = "Back Office",
            "nb_users" => $nbUsers = count($this->userRepository->findAll()),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('DWWM SHOP')
            ->setFaviconPath('images/j4l_logo.svg');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('DASHBOARD', 'fa fa-home');

        yield MenuItem::section("Gerer Les Users");
        yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);

        yield MenuItem::section("Gerer Les Produits");
        yield MenuItem::linkToCrud('Marques', 'fas fa-list', Marque::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Processeurs', 'fas fa-list', Processeur::class);
        yield MenuItem::linkToCrud('Ecrans', 'fas fa-list', Ecran::class);
        yield MenuItem::linkToCrud('Connectiques', 'fas fa-list', Connectique::class);
        yield MenuItem::linkToCrud('Memoires', 'fas fa-list', Memoire::class);
        yield MenuItem::linkToCrud('Stockages', 'fas fa-list', Stockage::class);
        yield MenuItem::linkToCrud('Boitiers', 'fas fa-list', Boitier::class);
        yield MenuItem::linkToCrud('Cartes VGA', 'fas fa-list', CarteGraphique::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Produit::class);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($this->getUser()->getNomComplet());
    }
}
