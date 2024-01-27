<?php

namespace App\Entity;

use App\Repository\AchievementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AchievementRepository::class)]
class Achievement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $requirement = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(length: 255)]
    private ?string $dateUnlocked = null;

    #[ORM\Column(length: 255)]
    private ?string $achievementID = null;

    #[ORM\Column(length: 255)]
    private ?string $gameID = null;

    #[ORM\Column(length: 255)]
    private ?string $playerID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequirement(): ?string
    {
        return $this->requirement;
    }

    public function setRequirement(string $requirement): static
    {
        $this->requirement = $requirement;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDateUnlocked(): ?string
    {
        return $this->dateUnlocked;
    }

    public function setDateUnlocked(string $dateUnlocked): static
    {
        $this->dateUnlocked = $dateUnlocked;

        return $this;
    }

    public function getAchievementID(): ?string
    {
        return $this->achievementID;
    }

    public function setAchievementID(string $achievementID): static
    {
        $this->achievementID = $achievementID;

        return $this;
    }

    public function getGameID(): ?string
    {
        return $this->gameID;
    }

    public function setGameID(string $gameID): static
    {
        $this->gameID = $gameID;

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
