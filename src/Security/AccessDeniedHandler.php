<?php


namespace App\Security;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var Security
     */
    private $security;

    public function __construct(RouterInterface $router, Security $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    /**
     * @inheritDoc
     */
    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        if (!$this->security->isGranted("ROLE_ADMIN")) {
            return new RedirectResponse($this->router->generate("store_accueil"));
        }
    }
}