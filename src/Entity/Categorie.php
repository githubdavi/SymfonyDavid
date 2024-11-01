<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $label = null;

    /**
     * @var Collection<int, media>
     */
    #[ORM\ManyToMany(targetEntity: media::class, inversedBy: 'categories')]
    private Collection $idCat;

    public function __construct()
    {
        $this->idCat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, media>
     */
    public function getIdCat(): Collection
    {
        return $this->idCat;
    }

    public function addIdCat(media $idCat): static
    {
        if (!$this->idCat->contains($idCat)) {
            $this->idCat->add($idCat);
        }

        return $this;
    }

    public function removeIdCat(media $idCat): static
    {
        $this->idCat->removeElement($idCat);

        return $this;
    }
}
