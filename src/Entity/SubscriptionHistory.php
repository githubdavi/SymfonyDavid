<?php

namespace App\Entity;

use App\Repository\SubscriptionHistoryRepository;
<<<<<<< HEAD
=======
use Doctrine\DBAL\Types\Types;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionHistoryRepository::class)]
class SubscriptionHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

<<<<<<< HEAD
    #[ORM\Column]
    private ?\DateTimeImmutable $startAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $endAt = null;

    #[ORM\ManyToOne(inversedBy: 'subscriptionHistories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $subscriber = null;

    #[ORM\ManyToOne(inversedBy: 'subscriptionHistories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subscription $subscription = null;
=======
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\ManyToOne(inversedBy: 'subscriptionHistories')]
    private ?user $userId = null;

    #[ORM\ManyToOne(inversedBy: 'subscriptionHistories')]
    private ?subscription $subscriptionID = null;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->startAt;
    }

    public function setStartAt(\DateTimeImmutable $startAt): static
    {
        $this->startAt = $startAt;
=======
    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }

<<<<<<< HEAD
    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeImmutable $endAt): static
    {
        $this->endAt = $endAt;
=======
    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

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
    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    public function setSubscription(?Subscription $subscription): static
    {
        $this->subscription = $subscription;
=======
    public function getSubscriptionID(): ?subscription
    {
        return $this->subscriptionID;
    }

    public function setSubscriptionID(?subscription $subscriptionID): static
    {
        $this->subscriptionID = $subscriptionID;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }
}
