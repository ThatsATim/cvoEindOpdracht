<?php

namespace App\Entity;

use App\Repository\LeaderboardRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeaderboardRepository::class)]
class Leaderboard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $GameID = null;

    #[ORM\Column(length: 255)]
    private ?string $time = null;

    #[ORM\Column(length: 255)]
    private ?string $score = null;

    #[ORM\Column(length: 255)]
    private ?string $playerID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGameID(): ?string
    {
        return $this->GameID;
    }

    public function setGameID(string $GameID): static
    {
        $this->GameID = $GameID;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): static
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

    public function getPlayerID(): ?string
    {
        return $this->playerID;
    }

    public function setPlayerID(string $playerID): static
    {
        $this->playerID = $playerID;

        return $this;
    }
}
