<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Class UserCrudController
 * @package App\Controller\Admin
 * @IsGranted("ROLE_ADMIN", message="Vous n'avez pas les droits necessaires pour acceder à cette ressource")
 */
class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('prenom', 'Prénom'),
            TextField::new('nom', 'Nom'),
            TextField::new('nomComplet', 'Nom Complet'),
            TextField::new('email', 'Email'),
            DateTimeField::new('createdAt', 'Date de creation')
        ];
    }

}
