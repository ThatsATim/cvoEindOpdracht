<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $gender = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column]
    private ?bool $isBanned = null;

    #[ORM\Column]
    private ?bool $isAdmin = null;

    #[ORM\Column]
    private ?bool $isMuted = null;

    #[ORM\Column]
    private ?bool $isFriendInviteBlocked = null;

    #[ORM\ManyToMany(targetEntity: Game::class, inversedBy: 'players')]
    private Collection $gamesPlayed;

    #[ORM\OneToMany(mappedBy: 'player', targetEntity: Score::class)]
    private Collection $scores;

    #[ORM\OneToMany(mappedBy: 'userA', targetEntity: Message::class)]
    private Collection $messages;

    #[ORM\OneToMany(mappedBy: 'userA', targetEntity: Friend::class)]
    private Collection $friends;

    #[ORM\ManyToMany(targetEntity: Achievement::class, mappedBy: 'player')]
    private Collection $achievements;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    public function __construct()
    {
        $this->gamesPlayed = new ArrayCollection();
        $this->scores = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->friends = new ArrayCollection();
        $this->achievements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): static
    {
        $this->birthday = $birthday;

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

    public function isIsBanned(): ?bool
    {
        return $this->isBanned;
    }

    public function setIsBanned(bool $isBanned): static
    {
        $this->isBanned = $isBanned;

        return $this;
    }

    public function isIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): static
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    public function isIsMuted(): ?bool
    {
        return $this->isMuted;
    }

    public function setIsMuted(bool $isMuted): static
    {
        $this->isMuted = $isMuted;

        return $this;
    }

    public function isIsFriendInviteBlocked(): ?bool
    {
        return $this->isFriendInviteBlocked;
    }

    public function setIsFriendInviteBlocked(bool $isFriendInviteBlocked): static
    {
        $this->isFriendInviteBlocked = $isFriendInviteBlocked;

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGamesPlayed(): Collection
    {
        return $this->gamesPlayed;
    }

    public function addGamesPlayed(Game $gamesPlayed): static
    {
        if (!$this->gamesPlayed->contains($gamesPlayed)) {
            $this->gamesPlayed->add($gamesPlayed);
        }

        return $this;
    }

    public function removeGamesPlayed(Game $gamesPlayed): static
    {
        $this->gamesPlayed->removeElement($gamesPlayed);

        return $this;
    }

    /**
     * @return Collection<int, Score>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(Score $score): static
    {
        if (!$this->scores->contains($score)) {
            $this->scores->add($score);
            $score->setPlayer($this);
        }

        return $this;
    }

    public function removeScore(Score $score): static
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getPlayer() === $this) {
                $score->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setUserA($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getUserA() === $this) {
                $message->setUserA(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Friend>
     */
    public function getFriends(): Collection
    {
        return $this->friends;
    }

    public function addFriend(Friend $friend): static
    {
        if (!$this->friends->contains($friend)) {
            $this->friends->add($friend);
            $friend->setUserA($this);
        }

        return $this;
    }

    public function removeFriend(Friend $friend): static
    {
        if ($this->friends->removeElement($friend)) {
            // set the owning side to null (unless already changed)
            if ($friend->getUserA() === $this) {
                $friend->setUserA(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Achievement>
     */
    public function getAchievements(): Collection
    {
        return $this->achievements;
    }

    public function addAchievement(Achievement $achievement): static
    {
        if (!$this->achievements->contains($achievement)) {
            $this->achievements->add($achievement);
            $achievement->addPlayer($this);
        }

        return $this;
    }

    public function removeAchievement(Achievement $achievement): static
    {
        if ($this->achievements->removeElement($achievement)) {
            $achievement->removePlayer($this);
        }

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
