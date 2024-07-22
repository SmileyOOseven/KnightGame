<?php

/*
 * wählt die verschiedenen Kämpfe zufällig aus, gerade Zahlen müssen vorher beachtet werden
 * skalierbarkeit -> über alles in der Welt
 * darum muss jedes Objekt wissen wieviel schaden es einem anderen objekt zufügt, dies wird random ausgewählt.
 * jeder Ritter muss seine Lebensenergie kennen und bei <=0 krepieren
 */


class FightManager
{
    private Knight $knightA;

    private Knight $knightB;

    private Knight $knightWinner;

    private array $winners;
    private array $knightsArray;

    function __construct(&$knightsArray)
    {
        $this->knightsArray = &$knightsArray;
    }

    public function doFight(): void
    {
        $this->getTwoKnights($this->knightsArray); //delete also (array_pop)

        $this->takeDamage();

        $this->knightComparison();

        $this->saveWinner();
    }

    private function getTwoKnights(array &$knightsArray): void
    {
        shuffle($knightsArray);

        $this->knightA = array_pop($knightsArray);

        $this->knightB = array_pop($knightsArray);
    }

    public function getWinners(): array
    {
        return $this->winners;
    }

    private function takeDamage(): void
    {
        $this->knightA->takeDamage($this->knightB->giveDamage());
        $this->knightB->takeDamage($this->knightA->giveDamage());
    }

    private function knightComparison(): void
    {
        $lifePointsKA = $this->knightA->getLifepoints();
        $lifePointsKB = $this->knightB->getLifepoints();

        if ($lifePointsKA < 0 && $lifePointsKB < 0) {
            $this->knightA->triggerBloodlust();
            $this->knightB->triggerBloodlust();
        }

        if ($lifePointsKA >= $lifePointsKB) {
            $this->knightWinner = $this->knightA;
        } else {
            $this->knightWinner = $this->knightB;
        }
    }

    private function saveWinner(): void
    {
        $this->winners[] = $this->knightWinner;
    }
}