<?php

namespace App\Entity;

use App\Repository\PlaylistSubscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistSubscriptionRepository::class)]
class PlaylistSubscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubscribedAt(): ?\DateTimeInterface
    {
        return $this->subscribedAt;
    }

    public function setSubscribedAt(\DateTimeInterface $subscribedAt): static
    {
        $this->subscribedAt = $subscribedAt;

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

        return $this;
    }
}
