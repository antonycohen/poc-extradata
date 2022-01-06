<?php

namespace App\Controller\Admin;

use App\Entity\MySuperEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MySuperEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MySuperEntity::class;
    }


    public function configureFields(string $pageName): iterable
    {

        //Fetch Dedicated Config
        $dedicatedConfig = [
            TextField::new('attributes.descripiion'),
            IntegerField::new('attributes.cool'),
        ];

        return array_merge([
            IdField::new('name')
        ], $dedicatedConfig);
    }


}
