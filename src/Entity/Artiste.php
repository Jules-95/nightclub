<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteRepository::class)]
class Artiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    /**
     * @var Collection<int, Soiree>
     */
    #[ORM\ManyToMany(targetEntity: Soiree::class, mappedBy: 'artistes')]
    private Collection $soirees;

    public function __construct()
    {
        $this->soirees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Soiree>
     */
    public function getSoirees(): Collection
    {
        return $this->soirees;
    }

    public function addSoiree(Soiree $soiree): static
    {
        if (!$this->soirees->contains($soiree)) {
            $this->soirees->add($soiree);
            $soiree->addArtiste($this);
        }

        return $this;
    }

    public function removeSoiree(Soiree $soiree): static
    {
        if ($this->soirees->removeElement($soiree)) {
            $soiree->removeArtiste($this);
        }

        return $this;
    }
}
