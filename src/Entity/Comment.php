<?php

namespace App\Entity;

<<<<<<< HEAD
use App\Enum\CommentStatusEnum;
use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
=======
use App\enum\CommentStatusEnum;
use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

<<<<<<< HEAD
    #[ORM\Column(type: Types::TEXT)]
=======
    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column]
    private ?int $media_id = null;

    #[ORM\Column]
    private ?int $parentCommentId = null;

    #[ORM\Column(length: 255)]
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    private ?string $content = null;

    #[ORM\Column(enumType: CommentStatusEnum::class)]
    private ?CommentStatusEnum $status = null;

<<<<<<< HEAD
    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'childComments')]
    private ?self $parentComment = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parentComment')]
    private Collection $childComments;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $publisher = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Media $media = null;

    public function __construct()
    {
        $this->childComments = new ArrayCollection();
=======
    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'parentComment')]
    private Collection $comments;

    #[ORM\Column(length: 255)]
    private ?string $user = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $comment = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?user $userId = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?media $mediaId = null;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    }

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
=======
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getMediaId(): ?int
    {
        return $this->media_id;
    }

    public function setMediaId(int $media_id): static
    {
        $this->media_id = $media_id;

        return $this;
    }

    public function getParentCommentId(): ?int
    {
        return $this->parentCommentId;
    }

    public function setParentCommentId(int $parentCommentId): static
    {
        $this->parentCommentId = $parentCommentId;

        return $this;
    }

>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getStatus(): ?CommentStatusEnum
    {
        return $this->status;
    }

    public function setStatus(CommentStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }

<<<<<<< HEAD
    public function getParentComment(): ?self
    {
        return $this->parentComment;
    }

    public function setParentComment(?self $parentComment): static
    {
        $this->parentComment = $parentComment;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildComments(): Collection
    {
        return $this->childComments;
    }

    public function addChildComment(self $childComment): static
    {
        if (!$this->childComments->contains($childComment)) {
            $this->childComments->add($childComment);
            $childComment->setParentComment($this);
        }
=======
    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    // public function addComment(Comment $comment): static
    // {
    //     if (!$this->comments->contains($comment)) {
    //         $this->comments->add($comment);
    //         $comment->setParentComment($this);
    //     }

    //     return $this;
    // }

    // public function removeComment(Comment $comment): static
    // {
    //     if ($this->comments->removeElement($comment)) {
    //         // set the owning side to null (unless already changed)
    //         if ($comment->getParentComment() === $this) {
    //             $comment->setParentComment(null);
    //         }
    //     }

    //     return $this;
    // }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): static
    {
        $this->user = $user;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }

<<<<<<< HEAD
    public function removeChildComment(self $childComment): static
    {
        if ($this->childComments->removeElement($childComment)) {
            // set the owning side to null (unless already changed)
            if ($childComment->getParentComment() === $this) {
                $childComment->setParentComment(null);
            }
        }

        return $this;
    }

    public function getPublisher(): ?User
    {
        return $this->publisher;
    }

    public function setPublisher(?User $publisher): static
    {
        $this->publisher = $publisher;

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
    public function getComment(): ?user
    {
        return $this->comment;
    }

    public function setComment(?user $comment): static
    {
        $this->comment = $comment;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }
}
