<?php

namespace App\Entity;

use App\Repository\MySuperEntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MySuperEntityRepository::class)
 */
class MySuperEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @var Attributes
     * @ORM\Column(type="attributes_type", nullable=true)
     */
    private $attributes;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return Attributes
     */
    public function getAttributes(): ?Attributes
    {
        if(!$this->attributes){
            $this->attributes = new Attributes([]);
        }
        return $this->attributes;
    }

    /**
     * @param Attributes $attributes
     * @return MySuperEntity
     */
    public function setAttributes(Attributes $attributes): MySuperEntity
    {
        $this->attributes = $attributes;
        return $this;
    }



}
