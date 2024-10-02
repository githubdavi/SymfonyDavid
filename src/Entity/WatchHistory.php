<?php

namespace App\Entity;

use App\Repository\WatchHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WatchHistoryRepository::class)]
class WatchHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numberOfView = null;

    #[ORM\ManyToOne(inversedBy: 'watchHistories')]
    private ?user $userId = null;

    #[ORM\ManyToOne(inversedBy: 'watchHistories')]
    private ?media $mediaId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOfView(): ?string
    {
        return $this->numberOfView;
    }

    public function setNumberOfView(string $numberOfView): static
    {
        $this->numberOfView = $numberOfView;

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->userId;
    }

    public function setUserId(?user $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getMediaId(): ?media
    {
        return $this->mediaId;
    }

    public function setMediaId(?media $mediaId): static
    {
        $this->mediaId = $mediaId;

        return $this;
    }
}
