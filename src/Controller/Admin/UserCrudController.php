<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $roles = [
            'User'   => 'ROLE_USER',
            'Admin'  => 'ROLE_ADMIN'
        ];
        return [
            TextField::new('email'),
            TextField::new('password'),
            ChoiceField::new('roles')->setChoices($roles)->allowMultipleChoices(),
        ];
    }
}
