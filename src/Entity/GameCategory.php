<?php

namespace App\Entity;

use App\Repository\GameCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameCategoryRepository::class)]
class GameCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: GamePictures::class)]
    private Collection $gamePictures;

    public function __construct()
    {
        $this->gamePictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, GamePictures>
     */
    public function getGamePictures(): Collection
    {
        return $this->gamePictures;
    }

    public function addGamePicture(GamePictures $gamePicture): self
    {
        if (!$this->gamePictures->contains($gamePicture)) {
            $this->gamePictures->add($gamePicture);
            $gamePicture->setCategory($this);
        }

        return $this;
    }

    public function removeGamePicture(GamePictures $gamePicture): self
    {
        if ($this->gamePictures->removeElement($gamePicture)) {
            // set the owning side to null (unless already changed)
            if ($gamePicture->getCategory() === $this) {
                $gamePicture->setCategory(null);
            }
        }

        return $this;
    }
}
