<?php

/*
 * wählt die verschiedenen Kämpfe zufällig aus, gerade Zahlen müssen vorher beachtet werden
 * skalierbarkeit -> über alles in der Welt
 * darum muss jedes Objekt wissen wieviel schaden es einem anderen objekt zufügt, dies wird random ausgewählt.
 * jeder Ritter muss seine Lebensenergie kennen und bei <=0 krepieren
 */


class FightManager
{
    /**
     * @var Knight
     */
    public $knightA;
    /**
     * @var Knight
     */
    public $knightB;

    private $knightWinner;

    public array $calculatedKnightsArray;

    function getTwoKnights(array &$knightsArray): void
    {
        shuffle($knightsArray);

        $this->knightA = array_pop($knightsArray);

        $this->knightB = array_pop($knightsArray);
    }

    function takeDamage(): void
    {
        $this->knightA->takeDamage($this->knightB->giveDamage());
        $this->knightB->takeDamage($this->knightA->giveDamage());
    }


    function KnightComparsion(): void
    {
        $lifePointsKA = $this->knightA->getLifepoints();
        $lifePointsKB = $this->knightB->getLifepoints();

        if ($lifePointsKA <0 && $lifePointsKB <0) {
            $this->knightA->triggerBloodlust();
            $this->knightB->triggerBloodlust();
        }

        if ($lifePointsKA >= $lifePointsKB) {
            $this->knightWinner = $this->knightA;
        }
        else {
            $this->knightWinner = $this->knightB;
        }
    }

    function saveCalculatedKnights(): void
    {
        $this->calculatedKnightsArray[] = $this->knightWinner;
    }
}