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
    private ?string $prenomPseudo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Chanson>
     */
    #[ORM\OneToMany(targetEntity: Chanson::class, mappedBy: 'chanteur')]
    private Collection $chansons;

    public function __construct()
    {
        $this->chansons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomPseudo(): ?string
    {
        return $this->prenomPseudo;
    }

    public function setPrenomPseudo(string $prenomPseudo): static
    {
        $this->prenomPseudo = $prenomPseudo;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Chanson>
     */
    public function getChansons(): Collection
    {
        return $this->chansons;
    }

    public function addChanson(Chanson $chanson): static
    {
        if (!$this->chansons->contains($chanson)) {
            $this->chansons->add($chanson);
            $chanson->setChanteur($this);
        }

        return $this;
    }

    public function removeChanson(Chanson $chanson): static
    {
        if ($this->chansons->removeElement($chanson)) {
            // set the owning side to null (unless already changed)
            if ($chanson->getChanteur() === $this) {
                $chanson->setChanteur(null);
            }
        }

        return $this;
    }
}
