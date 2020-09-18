<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller
 * @Route("/", name="app_")
 */
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        // récupère l'erreur de connexion s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();

        // dernier nom d'utilisateur saisi par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            "titre_page" => $titrePage = "Login",
            "titre_section" => $titreSection = "page de login",
            "last_username" => $lastUsername,
            "error" => $error,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/register", name="register")
     */
    public function register(Request $request)
    {
        return $this->render("security/register.html.twig", [
            "titre_page" => $titrePage = "Register",
            "titre_section" => $titreSection = "page d'inscription",
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        return new Exception("Sera intercepté avant d'arriver ici");
    }
}
