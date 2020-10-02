<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $nom = TextField::new('nom', 'Nom');
        $description = TextEditorField::new('description');
        $slug = TextField::new('slug');
        $createdAt = DateTimeField::new('createdAt', 'Date de création');
        $updatedAt = DateTimeField::new('updatedAt', 'Date de création');

        if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL) {
            $champ = [$nom, $description, $slug, $createdAt, $updatedAt];
        } else {
            $champ = [$nom, $description];
        }
        return $champ;
    }

}
