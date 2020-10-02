<?php

namespace App\Controller\Admin;

use App\Entity\Ecran;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EcranCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ecran::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('typeEcran', "Type d'ecran"),
            TextField::new('resolution', "Resolution"),
            TextField::new('taille', "Taille d'écran (pouces)"),
            BooleanField::new('dalleMate',"Ecran à Dalle mate"),
            BooleanField::new("uHd4k", "Full HD 4k"),
            BooleanField::new("tactile", "Tactile"),
        ];
    }

}
