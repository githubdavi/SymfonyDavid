<?php

<<<<<<< HEAD
namespace App\Entity;

use App\Repository\PlaylistMediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistMediaRepository::class)]
class PlaylistMedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $addedAt = null;

    #[ORM\ManyToOne(inversedBy: 'playlistMedia')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Playlist $playlist = null;

    #[ORM\ManyToOne(inversedBy: 'playlistMedia')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Media $media = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddedAt(): ?\DateTimeImmutable
    {
        return $this->addedAt;
    }

    public function setAddedAt(\DateTimeImmutable $addedAt): static
    {
        $this->addedAt = $addedAt;

        return $this;
    }

    public function getPlaylist(): ?Playlist
    {
        return $this->playlist;
    }

    public function setPlaylist(?Playlist $playlist): static
    {
        $this->playlist = $playlist;

        return $this;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): static
    {
        $this->media = $media;

        return $this;
    }
}
=======
// namespace App\Entity;

// use App\Repository\PlaylistMediaRepository;
// use Doctrine\Common\Collections\ArrayCollection;
// use Doctrine\Common\Collections\Collection;
// use Doctrine\ORM\Mapping as ORM;

// #[ORM\Entity(repositoryClass: PlaylistMediaRepository::class)]
// class PlaylistMedia
// {
//     #[ORM\Id]
//     #[ORM\GeneratedValue]
//     #[ORM\Column]
//     private ?int $id = null;

//     #[ORM\Column]
//     private ?\DateTimeImmutable $addedAt = null;

//     /**
//      * @var Collection<int, media>
//      */
//     #[ORM\ManyToMany(targetEntity: media::class, inversedBy: 'playlistMedia')]
//     private Collection $playlistId;

//     /**
//      * @var Collection<int, media>
//      */
//     #[ORM\ManyToMany(targetEntity: media::class, inversedBy: 'playlistMedia')]
//     private Collection $mediaID;

//     public function __construct()
//     {
//         $this->playlistId = new ArrayCollection();
//         $this->mediaID = new ArrayCollection();
//     }

//     public function getId(): ?int
//     {
//         return $this->id;
//     }

//     public function getAddedAt(): ?\DateTimeImmutable
//     {
//         return $this->addedAt;
//     }

//     public function setAddedAt(\DateTimeImmutable $addedAt): static
//     {
//         $this->addedAt = $addedAt;

//         return $this;
//     }

//     /**
//      * @return Collection<int, media>
//      */
//     public function getPlaylistId(): Collection
//     {
//         return $this->playlistId;
//     }

//     public function addPlaylistId(media $playlistId): static
//     {
//         if (!$this->playlistId->contains($playlistId)) {
//             $this->playlistId->add($playlistId);
//         }

//         return $this;
//     }

//     public function removePlaylistId(media $playlistId): static
//     {
//         $this->playlistId->removeElement($playlistId);

//         return $this;
//     }

//     /**
//      * @return Collection<int, media>
//      */
//     public function getMediaID(): Collection
//     {
//         return $this->mediaID;
//     }

//     public function addMediaID(media $mediaID): static
//     {
//         if (!$this->mediaID->contains($mediaID)) {
//             $this->mediaID->add($mediaID);
//         }

//         return $this;
//     }

//     public function removeMediaID(media $mediaID): static
//     {
//         $this->mediaID->removeElement($mediaID);

//         return $this;
//     }
// }
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
