<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeasonRepository::class)]
class Season
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $seassonNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $episode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeassonNumber(): ?int
    {
        return $this->seassonNumber;
    }

    public function setSeassonNumber(int $seassonNumber): static
    {
        $this->seassonNumber = $seassonNumber;

        return $this;
    }

    public function getEpisode(): ?string
    {
        return $this->episode;
    }

    public function setEpisode(string $episode): static
    {
        $this->episode = $episode;

        return $this;
    }
}
