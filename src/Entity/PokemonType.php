<?php

namespace App\Entity;

use App\Repository\PokemonTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonTypeRepository::class)
 */
class PokemonType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\Column(type="integer")
    */
    private $typeId;

    /**
     * @ORM\Column(type="integer")
     */
    private $pokemonNumero;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }

    public function getPokemonNumero(): ?int
    {
        return $this->pokemonNumero;
    }

    public function setPokemonNumero(int $pokemonNumero): self
    {
        $this->pokemonNumero = $pokemonNumero;

        return $this;
    }

}
