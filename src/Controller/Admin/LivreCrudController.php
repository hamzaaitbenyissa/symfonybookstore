<?php

namespace App\Controller\Admin;

use App\Entity\Livre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LivreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livre::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            // TextField::new('title'),
            // TextEditorField::new('description'),

            'isbn',
            TextField::new('titre'),
            IntegerField::new('nombre_pages')->onlyOnIndex(),
            'date_de_parution',
            'note',
            AssociationField::new('auteurs',)->setRequired(true)->formatValue(function ($value, $entity) {
                $str = $entity->getAuteurs()[0];
                for ($i = 1; $i < $entity->getAuteurs()->count(); $i++) {
                    $str = $str . " - " . $entity->getAuteurs()[$i];
                }
                return $str;
            }),

            AssociationField::new('genres')->setRequired(true)->formatValue(function ($value, $entity) {
                $str = $entity->getGenres()[0];
                for ($i = 1; $i < $entity->getGenres()->count(); $i++) {
                    $str = $str . " - " . $entity->getGenres()[$i];
                }
                return $str;
            }),
        ];
    }
}
