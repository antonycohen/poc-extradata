<?php

namespace App\Controller\Admin;

use App\Entity\MySuperEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
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

        //Config Table; id, customer_id, field_name, field_type
        //822, 11, brand, string
        //823, 11, birth_date, datetime
        //823, 11, level, integer


        //Fetch Dedicated Config
        $dedicatedConfig = [
            TextField::new('attributes.description'),
        ];

        return array_merge([
            IdField::new('name')
        ], $dedicatedConfig);
    }


}
