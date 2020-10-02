<?php

namespace App\Controller\Admin;

use App\Entity\Stockage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StockageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stockage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('type', "Mémoire vive (RAM) installée"),
            TextField::new('capacite', "Capacité du disque dur"),
            BooleanField::new('gamer', "Gamer"),
            BooleanField::new('lecteurGraveur', "Lecteur Graveur"),
        ];
    }

}
