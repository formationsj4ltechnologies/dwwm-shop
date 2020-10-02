<?php

namespace App\Controller\Admin;

use App\Entity\Connectique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Boolean;

class ConnectiqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Connectique::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('usb2', 'USB 2'),
            NumberField::new('usb3', 'USB 3'),
            BooleanField::new('usbc', 'USB C'),
            BooleanField::new('carteMemoire', 'Lecteur de carte mémoire'),
        ];
    }

}
