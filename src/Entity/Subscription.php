<?php

namespace App\Entity;

use App\Repository\SubscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionRepository::class)]
class Subscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

<<<<<<< HEAD
    #[ORM\Column(length: 255)]
=======
    #[ORM\Column(length: 100)]
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    private ?string $name = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
<<<<<<< HEAD
    private ?int $duration = null;
=======
    private ?int $durationMonth = null;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'currentSubscription')]
    private Collection $users;

    /**
     * @var Collection<int, SubscriptionHistory>
     */
<<<<<<< HEAD
    #[ORM\OneToMany(targetEntity: SubscriptionHistory::class, mappedBy: 'subscription')]
=======
    #[ORM\OneToMany(targetEntity: SubscriptionHistory::class, mappedBy: 'subscriptionID')]
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    private Collection $subscriptionHistories;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->subscriptionHistories = new ArrayCollection();
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

<<<<<<< HEAD
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;
=======
    public function getDurationMonth(): ?int
    {
        return $this->durationMonth;
    }

    public function setDurationMonth(int $durationMonth): static
    {
        $this->durationMonth = $durationMonth;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setCurrentSubscription($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCurrentSubscription() === $this) {
                $user->setCurrentSubscription(null);
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
            $subscriptionHistory->setSubscription($this);
=======
            $subscriptionHistory->setSubscriptionID($this);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
        }

        return $this;
    }

    public function removeSubscriptionHistory(SubscriptionHistory $subscriptionHistory): static
    {
        if ($this->subscriptionHistories->removeElement($subscriptionHistory)) {
            // set the owning side to null (unless already changed)
<<<<<<< HEAD
            if ($subscriptionHistory->getSubscription() === $this) {
                $subscriptionHistory->setSubscription(null);
=======
            if ($subscriptionHistory->getSubscriptionID() === $this) {
                $subscriptionHistory->setSubscriptionID(null);
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
            }
        }

        return $this;
    }
}
