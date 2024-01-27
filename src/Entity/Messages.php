<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessagesRepository::class)]
class Messages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $playerA = null;

    #[ORM\Column(length: 255)]
    private ?string $playerB = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    #[ORM\Column]
    private ?bool $isRemoved = null;

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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function isIsRemoved(): ?bool
    {
        return $this->isRemoved;
    }

    public function setIsRemoved(bool $isRemoved): static
    {
        $this->isRemoved = $isRemoved;

        return $this;
    }
}
