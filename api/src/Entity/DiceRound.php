<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"round:read"}},
 *      denormalizationContext={"groups"={"round:write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\DiceRoundRepository")
 */
class DiceRound
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"round:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"round:read", "round:write"})
     */
    private $game;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\DiceRoundResult", inversedBy="diceRound", cascade={"persist", "remove"})
     * @Groups({"round:read", "round:write"})
     */
    private $result;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DiceBet", mappedBy="diceRound", cascade={"persist", "remove"})
    @Groups({"round:read", "round:write"})
     */
    private $bets;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Groups({"round:read", "round:write"})
     */
    private $parameters = [];

    public function __construct()
    {
        $this->bets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }

    public function getResult(): ?DiceRoundResult
    {
        return $this->result;
    }

    public function setResult(?DiceRoundResult $result): self
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return Collection|DiceBet[]
     */
    public function getBets(): Collection
    {
        return $this->bets;
    }

    public function addBet(DiceBet $bet): self
    {
        if (!$this->bets->contains($bet)) {
            $this->bets[] = $bet;
            $bet->setDiceRound($this);
        }

        return $this;
    }

    public function removeBet(DiceBet $bet): self
    {
        if ($this->bets->contains($bet)) {
            $this->bets->removeElement($bet);
            // set the owning side to null (unless already changed)
            if ($bet->getDiceRound() === $this) {
                $bet->setDiceRound(null);
            }
        }

        return $this;
    }

    public function getParameters(): ?array
    {
        return $this->parameters;
    }

    public function setParameters(?array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }
}
