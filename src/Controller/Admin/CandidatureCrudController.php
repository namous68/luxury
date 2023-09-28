<?php

namespace App\Controller\Admin;

use App\Entity\Candidature;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CandidatureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidature::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('name'),
            TextField::new('email'),
            TextField::new('titre_offer'),
            TextField::new('society_name'),
            TextField::new('contact'),
            TextField::new('contact_mail'),
            DateField::new('deposite_date'),
            
        ];
    }
    
}
