<?php

namespace App\Entity;

use App\Repository\GamePicturesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamePicturesRepository::class)]
class GamePictures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $size = null;

    #[ORM\Column(length: 20)]
    private ?string $type = null;

    #[ORM\Column(type: Types::BLOB)]
    private $bin = null;

    #[ORM\ManyToOne(inversedBy: 'gamePictures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GameCategory $category = null;

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

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBin()
    {
        return $this->bin;
    }

    public function setBin($bin): self
    {
        $this->bin = $bin;

        return $this;
    }

    public function getCategory(): ?GameCategory
    {
        return $this->category;
    }

    public function setCategory(?GameCategory $category): self
    {
        $this->category = $category;

        return $this;
    }
}
