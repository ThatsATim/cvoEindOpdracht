<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $time = null;

    #[ORM\Column(length: 255)]
    private ?string $score = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    private ?Game $gameID = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    private ?User $playerID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getGameID(): ?Game
    {
        return $this->gameID;
    }

    public function setGameID(?Game $gameID): static
    {
        $this->gameID = $gameID;

        return $this;
    }

    public function getPlayerID(): ?User
    {
        return $this->playerID;
    }

    public function setPlayerID(?User $playerID): static
    {
        $this->playerID = $playerID;

        return $this;
    }
}
