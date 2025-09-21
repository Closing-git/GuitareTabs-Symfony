<?php

namespace App\Entity;

use App\Repository\ChansonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChansonRepository::class)]
class Chanson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\Column(nullable: true)]
    private ?int $difficulte = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tonalite = null;

    #[ORM\Column(nullable: true)]
    private ?int $capodastre = null;

    #[ORM\Column(nullable: true)]
    private ?float $vitesseDeplacement = null;

    #[ORM\Column]
    private ?int $nbClics = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $autre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getDifficulte(): ?int
    {
        return $this->difficulte;
    }

    public function setDifficulte(?int $difficulte): static
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    public function getTonalite(): ?string
    {
        return $this->tonalite;
    }

    public function setTonalite(?string $tonalite): static
    {
        $this->tonalite = $tonalite;

        return $this;
    }

    public function getCapodastre(): ?int
    {
        return $this->capodastre;
    }

    public function setCapodastre(?int $capodastre): static
    {
        $this->capodastre = $capodastre;

        return $this;
    }

    public function getVitesseDeplacement(): ?float
    {
        return $this->vitesseDeplacement;
    }

    public function setVitesseDeplacement(?float $vitesseDeplacement): static
    {
        $this->vitesseDeplacement = $vitesseDeplacement;

        return $this;
    }

    public function getNbClics(): ?int
    {
        return $this->nbClics;
    }

    public function setNbClics(int $nbClics): static
    {
        $this->nbClics = $nbClics;

        return $this;
    }

    public function getAutre(): ?string
    {
        return $this->autre;
    }

    public function setAutre(?string $autre): static
    {
        $this->autre = $autre;

        return $this;
    }
}
