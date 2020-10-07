<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Marque;
use App\Entity\Produit;
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
 * @IsGranted("ROLE_ADMIN", message="Vous n'avez pas les droits necessaires pour acceder à cette ressource")
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
        yield MenuItem::linktoDashboard('DASHBOARD', 'fas fa-home');

        yield MenuItem::section("Gerer Les Users");
        yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);

        yield MenuItem::section("Gerer Les Produits");
        yield MenuItem::linkToCrud('Marques', 'fas fa-list', Marque::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Produit::class);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($this->getUser()->getNomComplet());
    }
}
