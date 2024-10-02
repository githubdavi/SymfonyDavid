<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $code = null;

    /**
     * @var Collection<int, media>
     */
    #[ORM\ManyToMany(targetEntity: media::class, inversedBy: 'languages')]
    private Collection $idLanguage;

    public function __construct()
    {
        $this->idLanguage = new ArrayCollection();
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection<int, media>
     */
    public function getIdLanguage(): Collection
    {
        return $this->idLanguage;
    }

    public function addIdLanguage(media $idLanguage): static
    {
        if (!$this->idLanguage->contains($idLanguage)) {
            $this->idLanguage->add($idLanguage);
        }

        return $this;
    }

    public function removeIdLanguage(media $idLanguage): static
    {
        $this->idLanguage->removeElement($idLanguage);

        return $this;
    }
}
