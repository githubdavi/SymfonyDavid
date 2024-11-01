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

<<<<<<< HEAD
    #[ORM\Column]
    private ?\DateTimeImmutable $lastWatchedAt = null;

    #[ORM\Column]
    private ?int $numberOfViews = null;

    #[ORM\ManyToOne(inversedBy: 'watchHistories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $watcher = null;

    #[ORM\ManyToOne(inversedBy: 'watchHistories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Media $media = null;
=======
    #[ORM\Column(length: 255)]
    private ?string $numberOfView = null;

    #[ORM\ManyToOne(inversedBy: 'watchHistories')]
    private ?user $userId = null;

    #[ORM\ManyToOne(inversedBy: 'watchHistories')]
    private ?media $mediaId = null;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
    public function getLastWatchedAt(): ?\DateTimeImmutable
    {
        return $this->lastWatchedAt;
    }

    public function setLastWatchedAt(\DateTimeImmutable $lastWatchedAt): static
    {
        $this->lastWatchedAt = $lastWatchedAt;
=======
    public function getNumberOfView(): ?string
    {
        return $this->numberOfView;
    }

    public function setNumberOfView(string $numberOfView): static
    {
        $this->numberOfView = $numberOfView;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }

<<<<<<< HEAD
    public function getNumberOfViews(): ?int
    {
        return $this->numberOfViews;
    }

    public function setNumberOfViews(int $numberOfViews): static
    {
        $this->numberOfViews = $numberOfViews;
=======
    public function getUserId(): ?user
    {
        return $this->userId;
    }

    public function setUserId(?user $userId): static
    {
        $this->userId = $userId;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }

<<<<<<< HEAD
    public function getWatcher(): ?User
    {
        return $this->watcher;
    }

    public function setWatcher(?User $watcher): static
    {
        $this->watcher = $watcher;

        return $this;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): static
    {
        $this->media = $media;
=======
    public function getMediaId(): ?media
    {
        return $this->mediaId;
    }

    public function setMediaId(?media $mediaId): static
    {
        $this->mediaId = $mediaId;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }
}
