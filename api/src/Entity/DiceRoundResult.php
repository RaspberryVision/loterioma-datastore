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
     * @ORM\Column(type="integer")
     */
    private $balance;

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

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }
}
