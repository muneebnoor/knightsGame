<?php

require 'dice.php';
require 'knight.php';

class KnightsGame
{

    private Knight $winner;

    public function __construct(int $numberOfKnights = 6)
    {
        if ($numberOfKnights <= 0) {
            throw new Exception("Number of knights must be greater than 0");
        } else if ($numberOfKnights >= 100) {
            throw new Exception("Number of knights must be less than 100");
        } else {
            $this->initialize($numberOfKnights);
        }
    }

    private function initialize(int $numberOfKnights)
    {
        Dice::flush();
        knight::flush();
        $winner = $this->createGame($numberOfKnights);
        $this->winner = $winner;
    }

    private function simulate($knights)
    {
        if (count($knights) == 1) {
            return $knights[0];
        } else {
            return $this->simulation($knights);
        }
    }

    private function simulation($knights)
    {
        while (1) {
            for ($i = 0; $i < count($knights); $i++) {
                if (count($knights) > 1) {
                    $knight = $knights[$i];
                    $knight->removeHealthPoints(Dice::getDiceValue());
                    if ($knight->getHealthPoints() > 0) {
                        Dice::roll();
                    } else {
                        unset($knights[$i]);
                        $knights = array_values($knights);
                    }
                } else
                    return $knights[0];
            }
        }
    }

    private function createGame(int $numberOfKnights)
    {
        $knights = (array) null;
        for ($i = 0; $i < $numberOfKnights; $i++) {
            $knight = new Knight();
            $knights[$i] = $knight;
        }

        return $this->simulate($knights);
    }

    public function displayWinner()
    {
        echo "Knight on position {$this->winner->getId()} won with {$this->winner->gethealthPoints()} health points remaining" . PHP_EOL;
    }
}
