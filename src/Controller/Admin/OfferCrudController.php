<?php

namespace App\Controller\Admin;

use App\Entity\Offer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class OfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('reference'),
            AssociationField::new('client'),
            TextField::new('description'),
            BooleanField::new('isActive'),
            TextField::new('jobTitle'),
            TextField::new('jobLocation'),
            AssociationField::new('category')->autocomplete(),
            DateField::new('closingAt'),
            TextField::new('salary'),
            AssociationField::new('type')->autocomplete(),

        ];
    }
}
