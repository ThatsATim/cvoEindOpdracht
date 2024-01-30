<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    #[ORM\Column]
    private ?bool $isRemoved = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?User $userA = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?user $playerB = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUserA(): ?User
    {
        return $this->userA;
    }

    public function setUserA(?User $userA): static
    {
        $this->userA = $userA;

        return $this;
    }

    public function getPlayerB(): ?user
    {
        return $this->playerB;
    }

    public function setPlayerB(?user $playerB): static
    {
        $this->playerB = $playerB;

        return $this;
    }
}
