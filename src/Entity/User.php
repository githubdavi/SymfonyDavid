<?php

namespace App\Entity;

use App\Enum\UserAccountStatusEnum;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(enumType: UserAccountStatusEnum::class)]
    private ?UserAccountStatusEnum $accountStatus = UserAccountStatusEnum::INACTIVE;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Subscription $currentSubscription = null;

    /**
     * @var Collection<int, Comment>
     */
<<<<<<< HEAD
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'publisher')]
=======
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'comment')]
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    private Collection $comments;

    /**
     * @var Collection<int, SubscriptionHistory>
     */
<<<<<<< HEAD
    #[ORM\OneToMany(targetEntity: SubscriptionHistory::class, mappedBy: 'subscriber')]
=======
    #[ORM\OneToMany(targetEntity: SubscriptionHistory::class, mappedBy: 'userId')]
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    private Collection $subscriptionHistories;

    /**
     * @var Collection<int, PlaylistSubscription>
     */
<<<<<<< HEAD
    #[ORM\OneToMany(targetEntity: PlaylistSubscription::class, mappedBy: 'subscriber')]
    private Collection $playlistSubscriptions;

    /**
     * @var Collection<int, Playlist>
     */
    #[ORM\OneToMany(targetEntity: Playlist::class, mappedBy: 'creator')]
    private Collection $playlists;

    /**
     * @var Collection<int, WatchHistory>
     */
    #[ORM\OneToMany(targetEntity: WatchHistory::class, mappedBy: 'watcher')]
=======
    #[ORM\OneToMany(targetEntity: PlaylistSubscription::class, mappedBy: 'userId')]
    private Collection $playlistSubscriptions;

    /**
     * @var Collection<int, WatchHistory>
     */
    #[ORM\OneToMany(targetEntity: WatchHistory::class, mappedBy: 'userId')]
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    private Collection $watchHistories;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->subscriptionHistories = new ArrayCollection();
        $this->playlistSubscriptions = new ArrayCollection();
<<<<<<< HEAD
        $this->playlists = new ArrayCollection();
=======
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
        $this->watchHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getAccountStatus(): ?UserAccountStatusEnum
    {
        return $this->accountStatus;
    }

    public function setAccountStatus(UserAccountStatusEnum $accountStatus): static
    {
        $this->accountStatus = $accountStatus;

        return $this;
    }

    public function getCurrentSubscription(): ?Subscription
    {
        return $this->currentSubscription;
    }

    public function setCurrentSubscription(?Subscription $currentSubscription): static
    {
        $this->currentSubscription = $currentSubscription;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
<<<<<<< HEAD
            $comment->setPublisher($this);
=======
            $comment->setComment($this);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
<<<<<<< HEAD
            if ($comment->getPublisher() === $this) {
                $comment->setPublisher(null);
=======
            if ($comment->getComment() === $this) {
                $comment->setComment(null);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SubscriptionHistory>
     */
    public function getSubscriptionHistories(): Collection
    {
        return $this->subscriptionHistories;
    }

    public function addSubscriptionHistory(SubscriptionHistory $subscriptionHistory): static
    {
        if (!$this->subscriptionHistories->contains($subscriptionHistory)) {
            $this->subscriptionHistories->add($subscriptionHistory);
<<<<<<< HEAD
            $subscriptionHistory->setSubscriber($this);
=======
            $subscriptionHistory->setUserId($this);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
        }

        return $this;
    }

    public function removeSubscriptionHistory(SubscriptionHistory $subscriptionHistory): static
    {
        if ($this->subscriptionHistories->removeElement($subscriptionHistory)) {
            // set the owning side to null (unless already changed)
<<<<<<< HEAD
            if ($subscriptionHistory->getSubscriber() === $this) {
                $subscriptionHistory->setSubscriber(null);
=======
            if ($subscriptionHistory->getUserId() === $this) {
                $subscriptionHistory->setUserId(null);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlaylistSubscription>
     */
    public function getPlaylistSubscriptions(): Collection
    {
        return $this->playlistSubscriptions;
    }

    public function addPlaylistSubscription(PlaylistSubscription $playlistSubscription): static
    {
        if (!$this->playlistSubscriptions->contains($playlistSubscription)) {
            $this->playlistSubscriptions->add($playlistSubscription);
<<<<<<< HEAD
            $playlistSubscription->setSubscriber($this);
=======
            $playlistSubscription->setUserId($this);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
        }

        return $this;
    }

    public function removePlaylistSubscription(PlaylistSubscription $playlistSubscription): static
    {
        if ($this->playlistSubscriptions->removeElement($playlistSubscription)) {
            // set the owning side to null (unless already changed)
<<<<<<< HEAD
            if ($playlistSubscription->getSubscriber() === $this) {
                $playlistSubscription->setSubscriber(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Playlist>
     */
    public function getPlaylists(): Collection
    {
        return $this->playlists;
    }

    public function addPlaylist(Playlist $playlist): static
    {
        if (!$this->playlists->contains($playlist)) {
            $this->playlists->add($playlist);
            $playlist->setCreator($this);
        }

        return $this;
    }

    public function removePlaylist(Playlist $playlist): static
    {
        if ($this->playlists->removeElement($playlist)) {
            // set the owning side to null (unless already changed)
            if ($playlist->getCreator() === $this) {
                $playlist->setCreator(null);
=======
            if ($playlistSubscription->getUserId() === $this) {
                $playlistSubscription->setUserId(null);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, WatchHistory>
     */
    public function getWatchHistories(): Collection
    {
        return $this->watchHistories;
    }

    public function addWatchHistory(WatchHistory $watchHistory): static
    {
        if (!$this->watchHistories->contains($watchHistory)) {
            $this->watchHistories->add($watchHistory);
<<<<<<< HEAD
            $watchHistory->setWatcher($this);
=======
            $watchHistory->setUserId($this);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
        }

        return $this;
    }

    public function removeWatchHistory(WatchHistory $watchHistory): static
    {
        if ($this->watchHistories->removeElement($watchHistory)) {
            // set the owning side to null (unless already changed)
<<<<<<< HEAD
            if ($watchHistory->getWatcher() === $this) {
                $watchHistory->setWatcher(null);
=======
            if ($watchHistory->getUserId() === $this) {
                $watchHistory->setUserId(null);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
            }
        }

        return $this;
    }
}
