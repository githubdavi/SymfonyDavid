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

<<<<<<< HEAD
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 3)]
    private ?string $code = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class, mappedBy: 'languages')]
    private Collection $medias;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
=======
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
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    }

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
=======
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

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
<<<<<<< HEAD
     * @return Collection<int, Media>
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function addMedia(Media $media): static
    {
        if (!$this->medias->contains($media)) {
            $this->medias->add($media);
            $media->addLanguage($this);
=======
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
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeMedia(Media $media): static
    {
        if ($this->medias->removeElement($media)) {
            $media->removeLanguage($this);
        }
=======
    public function removeIdLanguage(media $idLanguage): static
    {
        $this->idLanguage->removeElement($idLanguage);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }
}
