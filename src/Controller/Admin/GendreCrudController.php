<?php

namespace App\Controller\Admin;

use App\Entity\Gendre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GendreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gendre::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            TextField::new('gendre'),
           // TextEditorField::new('description'),
        ];
    }
    
}
