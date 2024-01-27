<?php

namespace App\Entity;

use App\Repository\FriendsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FriendsRepository::class)]
class Friends
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $playerA = null;

    #[ORM\Column(length: 255)]
    private ?string $playerB = null;

    #[ORM\Column]
    private ?bool $pending = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayerA(): ?string
    {
        return $this->playerA;
    }

    public function setPlayerA(string $playerA): static
    {
        $this->playerA = $playerA;

        return $this;
    }

    public function getPlayerB(): ?string
    {
        return $this->playerB;
    }

    public function setPlayerB(string $playerB): static
    {
        $this->playerB = $playerB;

        return $this;
    }

    public function isPending(): ?bool
    {
        return $this->pending;
    }

    public function setPending(bool $pending): static
    {
        $this->pending = $pending;

        return $this;
    }
}
