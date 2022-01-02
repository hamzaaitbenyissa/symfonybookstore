<?php

namespace App\Controller\Admin;

use App\Entity\Genre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GenreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Genre::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            AssociationField::new('livres')->hideOnForm()->formatValue(function ($value, $entity) {
                $str = $entity->getLivres()[0];
                for ($i = 1; $i < $entity->getLivres()->count(); $i++) {
                    $str = $str . " - " . $entity->getLivres()[$i];
                }
                return $str;
            }),
        ];
    }
}
