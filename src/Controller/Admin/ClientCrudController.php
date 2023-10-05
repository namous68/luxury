<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('societyName'),
            TextField::new('typeofActivity'),
            TextField::new('nameContact'),
            TextField::new('contactPosition'),
            TextField::new('PhoneNumberContact'),
            TextField::new('mailContact'),
            TextEditorField::new('notes'),
        ];
    }
    
}
