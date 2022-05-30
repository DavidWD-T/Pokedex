<?php

namespace App\Controller;

use App\Repository\PokemonRepository;
use App\Repository\PokemonTypeRepository;
use App\Repository\TypeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController{

    /**
    * @Route("/", name="home")
    */
    public function home(PokemonRepository $pokemonRepository){
        $pokemons = $pokemonRepository->findAll();
        dump($pokemons);
        return $this->render('homepage.html.twig', [
            "pokemons" => $pokemons
        ]);
    }

    /**
    * @Route("/details/{numero}", name="details")
    */
    public function details(int $numero, PokemonRepository $pokemonRepository, PokemonTypeRepository $pokemonTypeRepository, TypeRepository $typeRepository){
        $pokemon = $pokemonRepository->findBy([
            "numero" => $numero
        ]);
        $pokemon  = $pokemon[0];

        $pokemonTypes = $pokemonTypeRepository->findBy([
            "pokemonNumero" => $numero
        ]);

        $types=[];
        foreach ($pokemonTypes as $index => $pokemonType) {
            
            $type = $typeRepository->findBy([
                "id" => $pokemonType->getTypeId()
            ]);
            $types[$index] = $type[0]; 
        }
        
        return $this->render('details.html.twig',[
            "pokemon" => $pokemon,
            "types" => $types
        ]);
    }

    /**
    * @Route("/types", name="types-list")
    */
    public function types(PokemonRepository $pokemonRepository, PokemonTypeRepository $pokemonTypeRepository, TypeRepository $typeRepository){
        $types = $typeRepository->findAll();

       
        
        return $this->render('types.html.twig', [
            "types" => $types
        ]);
    }
    /**
    * @Route("/types/{typeName}", name="type-list")
    */
    public function pokemonByType(string $typeName, PokemonRepository $pokemonRepository, PokemonTypeRepository $pokemonTypeRepository, TypeRepository $typeRepository){

        $type = $typeRepository->findBy([
            "name" => $typeName
        ]);
        $type = $type[0];

        $pokemonTypes = $pokemonTypeRepository->findBy([
            "typeId" => $type->getId()
        ]);

        $pokemons = [];
        foreach ($pokemonTypes as $index => $pokemonType) {
            
            $pokemon = $pokemonRepository->findBy([
                "numero" => $pokemonType->getPokemonNumero()
            ]);
            $pokemons[$index] = $pokemon[0]; 
        }

        return $this->render('pokemonByType.html.twig', [
            "pokemons" => $pokemons
        ]);
    }


    
}