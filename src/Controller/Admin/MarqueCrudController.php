<?php

namespace App\Controller\Admin;

use App\Entity\Marque;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Class MarqueCrudController
 * @package App\Controller\Admin
 *  @IsGranted("ROLE_ADMIN")
 */
class MarqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Marque::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInSingular('Marque')
            ->setEntityLabelInPlural("Marques")
            ->setPageTitle(Crud::PAGE_INDEX, "Liste des marques")
            ->setPageTitle(Crud::PAGE_NEW, "Ajouter une marque")
            ->setPageTitle(Crud::PAGE_EDIT, "Editer une marque")
            ->setPageTitle(Crud::PAGE_DETAIL, "Détails de la marque")
            ->setPaginatorPageSize(8);
    }

    public function configureFields(string $pageName): iterable
    {
        $nom = TextField::new('nom', 'Nom');
        $createdAt = DateTimeField::new('createdAt', 'Date de création');
        $updatedAt = DateTimeField::new('updatedAt', 'Date de modification');

        if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL) {
            $champ = [$nom, $createdAt, $updatedAt];
        }else{
            $champ=[$nom];
        }
        return $champ;
    }
}
