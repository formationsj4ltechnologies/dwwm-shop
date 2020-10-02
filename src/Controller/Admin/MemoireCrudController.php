<?php

namespace App\Controller\Admin;

use App\Entity\Memoire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MemoireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Memoire::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
