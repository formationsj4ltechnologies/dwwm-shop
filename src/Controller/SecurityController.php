<?php

namespace App\Controller;

use App\Form\UserRegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
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
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'titre_page' => $titrePage = "Login",
            'titre_section' => $titreSection = "page de login",
            'error' => $error,
            'last_username' => $lastUsername
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        return new Exception("Sera intercepté avant d'arriver ici");
    }

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param GuardAuthenticatorHandler $handler
     * @param LoginFormAuthenticator $authenticator
     * @return Response
     * @Route("/register", name="register")
     */
    public function register(
        Request $request,
        UserPasswordEncoderInterface $encoder,
        GuardAuthenticatorHandler $handler,
        LoginFormAuthenticator $authenticator)
    {
        $form = $this->createForm(UserRegistrationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $user->setPassword($encoder->encodePassword(
                $user,
                $form['plainPassword']->getData()
            ));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $handler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main'
            );
        }

        return $this->render("security/register.html.twig", [
            'titre_page' => $titrePage = "Register",
            'titre_section' => $titreSection = "page d'inscription",
            'registrationForm' => $form->createView(),
        ]);
    }
}
