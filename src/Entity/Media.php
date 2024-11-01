<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;

<<<<<<< HEAD
#[InheritanceType('JOINED')]
#[DiscriminatorColumn(name: 'discr', type: 'string')]
#[DiscriminatorMap(['serie' => Serie::class, 'movie' => Movie::class])]
#[ORM\Entity(repositoryClass: MediaRepository::class)]
=======
#[ORM\Entity(repositoryClass: MediaRepository::class)]
#[InheritanceType('JOINED')]
#[DiscriminatorColumn(name: 'type', type: 'string')]
#[DiscriminatorMap(['moovie' => Moovie::class, 'serie' => Serie::class])]
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

<<<<<<< HEAD
    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'media')]
    private Collection $comments;
=======
    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $shortDescription = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $longDescription = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(length: 255)]
    private ?string $cover = null;

    #[ORM\Column]
    private array $casting = [];

    #[ORM\Column]
    private array $staff = [];

    // /**
    //  * @var Collection<int, PlaylistMedia>
    //  */
    // #[ORM\OneToMany(targetEntity: PlaylistMedia::class, mappedBy: 'media')]
    // private Collection $playlistMedia;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

    /**
     * @var Collection<int, WatchHistory>
     */
    #[ORM\OneToMany(targetEntity: WatchHistory::class, mappedBy: 'media')]
    private Collection $watchHistories;

    /**
<<<<<<< HEAD
     * @var Collection<int, PlaylistMedia>
     */
    #[ORM\OneToMany(targetEntity: PlaylistMedia::class, mappedBy: 'media')]
    private Collection $playlistMedia;

    /**
     * @var Collection<int, Category>
     */
    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'medias')]
    private Collection $categories;
=======
     * @var Collection<int, Category>
     */
    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'media')]
    private Collection $category;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

    /**
     * @var Collection<int, Language>
     */
<<<<<<< HEAD
    #[ORM\ManyToMany(targetEntity: Language::class, inversedBy: 'medias')]
    private Collection $languages;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $shortDescription = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $longDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(length: 255)]
    private ?string $coverImage = null;

    #[ORM\Column]
    private array $staff = [];

    #[ORM\Column]
    private array $casting = [];

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->watchHistories = new ArrayCollection();
        $this->playlistMedia = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->languages = new ArrayCollection();
=======
    #[ORM\ManyToMany(targetEntity: Language::class, inversedBy: 'media')]
    private Collection $language;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'media')]
    private Collection $comments;

    public function __construct()
    {
        // $this->playlistMedia = new ArrayCollection();
        $this->watchHistories = new ArrayCollection();
        $this->category = new ArrayCollection();
        $this->language = new ArrayCollection();
        $this->comments = new ArrayCollection();
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    }

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
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
            $comment->setMedia($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getMedia() === $this) {
                $comment->setMedia(null);
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
            $watchHistory->setMedia($this);
        }

        return $this;
    }

    public function removeWatchHistory(WatchHistory $watchHistory): static
    {
        if ($this->watchHistories->removeElement($watchHistory)) {
            // set the owning side to null (unless already changed)
            if ($watchHistory->getMedia() === $this) {
                $watchHistory->setMedia(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlaylistMedia>
     */
    public function getPlaylistMedia(): Collection
    {
        return $this->playlistMedia;
    }

    public function addPlaylistMedium(PlaylistMedia $playlistMedium): static
    {
        if (!$this->playlistMedia->contains($playlistMedium)) {
            $this->playlistMedia->add($playlistMedium);
            $playlistMedium->setMedia($this);
        }

        return $this;
    }

    public function removePlaylistMedium(PlaylistMedia $playlistMedium): static
    {
        if ($this->playlistMedia->removeElement($playlistMedium)) {
            // set the owning side to null (unless already changed)
            if ($playlistMedium->getMedia() === $this) {
                $playlistMedium->setMedia(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, Language>
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): static
    {
        if (!$this->languages->contains($language)) {
            $this->languages->add($language);
        }

        return $this;
    }

    public function removeLanguage(Language $language): static
    {
        $this->languages->removeElement($language);
=======
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): static
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(string $longDescription): static
    {
        $this->longDescription = $longDescription;

        return $this;
    }

<<<<<<< HEAD
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

=======
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

<<<<<<< HEAD
    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage): static
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getStaff(): array
    {
        return $this->staff;
    }

    public function setStaff(array $staff): static
    {
        $this->staff = $staff;
=======
    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): static
    {
        $this->cover = $cover;
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778

        return $this;
    }

    public function getCasting(): array
    {
        return $this->casting;
    }

    public function setCasting(array $casting): static
    {
        $this->casting = $casting;

        return $this;
    }
<<<<<<< HEAD
=======

    public function getStaff(): array
    {
        return $this->staff;
    }

    public function stStaff(array $staff): static
    {
        $this->staff = $staff;

        return $this;
    }

    /**
     * @return Collection<int, PlaylistMedia>
     */
    // public function getPlaylistMedia(): Collection
    // {
    //     return $this->playlistMedia;
    // }

    // public function addPlaylistMedium(PlaylistMedia $playlistMedium): static
    // {
    //     if (!$this->playlistMedia->contains($playlistMedium)) {
    //         $this->playlistMedia->add($playlistMedium);
    //         // $playlistMedium->setMedia($this);
    //     }

    //     return $this;
    // }

    public function removePlaylistMedium(PlaylistMedia $playlistMedium): static
    {
        // if ($this->playlistMedia->removeElement($playlistMedium)) {
        //     // set the owning side to null (unless already changed)
        //     // if ($playlistMedium->getMedia() === $this) {
        //     //     $playlistMedium->setMedia(null);
        //     // }
        // }

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
            // $watchHistory->setMedia($this);
        }

        return $this;
    }

    public function removeWatchHistory(WatchHistory $watchHistory): static
    {
        if ($this->watchHistories->removeElement($watchHistory)) {
            // set the owning side to null (unless already changed)
            // if ($watchHistory->getMedia() === $this) {
            //     $watchHistory->setMedia(null);
            // }
        }

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Categorie $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): static
    {
        $this->category->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, Language>
     */
    public function getLanguage(): Collection
    {
        return $this->language;
    }

    public function addLanguage(Language $language): static
    {
        if (!$this->language->contains($language)) {
            $this->language->add($language);
        }

        return $this;
    }

    public function removeLanguage(Language $language): static
    {
        $this->language->removeElement($language);

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
            // $comment->setMedia($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            // if ($comment->getMedia() === $this) {
            //     $comment->setMedia(null);
            // }
        }

        return $this;
    }
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
}
