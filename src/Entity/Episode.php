<?php

namespace App\Entity;

use App\Repository\EpisodeRepository;
<<<<<<< HEAD
=======
use Doctrine\DBAL\Types\Types;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodeRepository::class)]
class Episode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

<<<<<<< HEAD
    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $releasedAt = null;

    #[ORM\ManyToOne(inversedBy: 'episodes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Season $season = null;
=======
    #[ORM\Column(length: 255)]
    private ?string $duration = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

<<<<<<< HEAD
    public function getDuration(): ?int
=======
    public function getDuration(): ?string
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    {
        return $this->duration;
    }

<<<<<<< HEAD
    public function setDuration(int $duration): static
=======
    public function setDuration(string $duration): static
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    {
        $this->duration = $duration;

        return $this;
    }

<<<<<<< HEAD
    public function getReleasedAt(): ?\DateTimeImmutable
    {
        return $this->releasedAt;
    }

    public function setReleasedAt(\DateTimeImmutable $releasedAt): static
    {
        $this->releasedAt = $releasedAt;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): static
    {
        $this->season = $season;
=======
    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }
}
