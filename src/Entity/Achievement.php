<?php

namespace App\Entity;

use App\Repository\AchievementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AchievementRepository::class)]
class Achievement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateUnlocked = null;

    #[ORM\ManyToOne(inversedBy: 'achievements')]
    private ?Game $gameID = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'achievements')]
    private Collection $playerID;

    public function __construct()
    {
        $this->playerID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDateUnlocked(): ?\DateTimeInterface
    {
        return $this->dateUnlocked;
    }

    public function setDateUnlocked(\DateTimeInterface $dateUnlocked): static
    {
        $this->dateUnlocked = $dateUnlocked;

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

    /**
     * @return Collection<int, User>
     */
    public function getPlayerID(): Collection
    {
        return $this->playerID;
    }

    public function addPlayerID(User $playerID): static
    {
        if (!$this->playerID->contains($playerID)) {
            $this->playerID->add($playerID);
        }

        return $this;
    }

    public function removePlayerID(User $playerID): static
    {
        $this->playerID->removeElement($playerID);

        return $this;
    }
}
