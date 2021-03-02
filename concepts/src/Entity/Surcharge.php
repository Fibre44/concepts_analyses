<?php

namespace App\Entity;

use App\Repository\SurchargeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SurchargeRepository::class)
 */
class Surcharge
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
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coderubrique;

    /**
     * @ORM\Column(type="integer")
     */
    private $idclient;

    public function getId(): ?int
    {
        return $this->id;
    }

   
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCoderubrique(): ?string
    {
        return $this->coderubrique;
    }

    public function setCoderubrique(string $coderubrique): self
    {
        $this->coderubrique = $coderubrique;

        return $this;
    }

    public function getIdclient(): ?int
    {
        return $this->idclient;
    }

    public function setIdclient(int $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

}
