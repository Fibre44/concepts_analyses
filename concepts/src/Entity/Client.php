<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $raisonsociale;

    /**
     * @ORM\OneToMany(targetEntity=Rubriqueclient::class, mappedBy="client", orphanRemoval=true)
     */
    private $rubriqueclients;

    public function __construct()
    {
        $this->rubriqueclients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonsociale(): ?string
    {
        return $this->raisonsociale;
    }

    public function setRaisonsociale(string $raisonsociale): self
    {
        $this->raisonsociale = $raisonsociale;

        return $this;
    }

    /**
     * @return Collection|Rubriqueclient[]
     */
    public function getRubriqueclients(): Collection
    {
        return $this->rubriqueclients;
    }

    public function addRubriqueclient(Rubriqueclient $rubriqueclient): self
    {
        if (!$this->rubriqueclients->contains($rubriqueclient)) {
            $this->rubriqueclients[] = $rubriqueclient;
            $rubriqueclient->setClient($this);
        }

        return $this;
    }

    public function removeRubriqueclient(Rubriqueclient $rubriqueclient): self
    {
        if ($this->rubriqueclients->removeElement($rubriqueclient)) {
            // set the owning side to null (unless already changed)
            if ($rubriqueclient->getClient() === $this) {
                $rubriqueclient->setClient(null);
            }
        }

        return $this;
    }
}
