<?php

namespace App\Entity;

use App\Repository\PlaylistSubscriptionRepository;
<<<<<<< HEAD
=======
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistSubscriptionRepository::class)]
class PlaylistSubscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

<<<<<<< HEAD
    #[ORM\Column]
    private ?\DateTimeImmutable $subscribedAt = null;

    #[ORM\ManyToOne(inversedBy: 'playlistSubscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $subscriber = null;

    #[ORM\ManyToOne(inversedBy: 'playlistSubscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Playlist $playlist = null;
=======
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $subscribedAt = null;

    #[ORM\ManyToOne(inversedBy: 'playlistSubscriptions')]
    private ?user $userId = null;

    /**
     * @var Collection<int, playlist>
     */
    #[ORM\ManyToMany(targetEntity: playlist::class, inversedBy: 'playlistSubscriptions')]
    private Collection $playlistId;

    public function __construct()
    {
        $this->playlistId = new ArrayCollection();
    }
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
    public function getSubscribedAt(): ?\DateTimeImmutable
=======
    public function getSubscribedAt(): ?\DateTimeInterface
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    {
        return $this->subscribedAt;
    }

<<<<<<< HEAD
    public function setSubscribedAt(\DateTimeImmutable $subscribedAt): static
=======
    public function setSubscribedAt(\DateTimeInterface $subscribedAt): static
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    {
        $this->subscribedAt = $subscribedAt;

        return $this;
    }

<<<<<<< HEAD
    public function getSubscriber(): ?User
    {
        return $this->subscriber;
    }

    public function setSubscriber(?User $subscriber): static
    {
        $this->subscriber = $subscriber;
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
    public function getPlaylist(): ?Playlist
    {
        return $this->playlist;
    }

    public function setPlaylist(?Playlist $playlist): static
    {
        $this->playlist = $playlist;
=======
    /**
     * @return Collection<int, playlist>
     */
    public function getPlaylistId(): Collection
    {
        return $this->playlistId;
    }

    public function addPlaylistId(playlist $playlistId): static
    {
        if (!$this->playlistId->contains($playlistId)) {
            $this->playlistId->add($playlistId);
        }

        return $this;
    }

    public function removePlaylistId(playlist $playlistId): static
    {
        $this->playlistId->removeElement($playlistId);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }
}
