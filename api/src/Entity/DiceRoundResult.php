<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiceRoundResultRepository")
 */
class DiceRoundResult
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $winningNumber;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\DiceRound", mappedBy="result", cascade={"persist", "remove"})
     */
    private $diceRound;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWinningNumber(): ?int
    {
        return $this->winningNumber;
    }

    public function setWinningNumber(int $winningNumber): self
    {
        $this->winningNumber = $winningNumber;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDiceRound(): ?DiceRound
    {
        return $this->diceRound;
    }

    public function setDiceRound(?DiceRound $diceRound): self
    {
        $this->diceRound = $diceRound;

        // set (or unset) the owning side of the relation if necessary
        $newResult = null === $diceRound ? null : $this;
        if ($diceRound->getResult() !== $newResult) {
            $diceRound->setResult($newResult);
        }

        return $this;
    }
}
