<?php

namespace App\Controller\Admin;

use App\Entity\PokemonType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PokemonTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PokemonType::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         IdField::new('id'),
    //         IntegerField::new('type_id'),
    //         IntegerField::new('pokemon_numero')
    //     ];
    // }
    
}
