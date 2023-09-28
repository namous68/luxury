<?php

namespace App\Controller\Admin;

use App\Entity\JobOffer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobOfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return JobOffer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
          
           TextField::new('titleJob'),
            BooleanField::new('isVisible'),
            DateField::new('createdAt'),
            DateField::new('expiredAt'),
            TextField::new('salary'),
            TextField::new('location'),
            TextField::new('description'),
            TextField::new('category'),
            TextField::new('contactMail'),
            DateField::new('closeDate'),
        ];
    }
    
}
