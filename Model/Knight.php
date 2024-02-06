<?php
class Knight
{

    //properties
    private $name;
    private $lifePoints;
    private $damage;

    //Methods

    function __construct($name = "Harald", $lifePoints = 100) //was soll alles in construct rein, sollte ich diese function mit der nächsten (setName), genau wie (setStartLifepoints), zusammenfassen?
    {
        $this->name = $name;
        $this->lifePoints = $lifePoints;
    }


    function getName(): string
    {
        return $this->name;
    }


    function getLifepoints(): int
    {
        return $this->lifePoints;
    }

    function bloodlust(int $minLife = 1, int $maxLife = 25): void
    {
        $this->lifePoints = rand($minLife,$maxLife);
    }

    function takeDamage($damage): void
    {
        $this->lifePoints = $this->lifePoints - $damage;
    }

    function triggerBloodlust($minLife=0){
        if($this->lifePoints <= $minLife){
            $this->bloodlust();
        }
    }


    public function giveDamage(int $min = 1, int $max = 90): int
    {
        return rand($min, $max);
    }

    function getSaveData(): array
    {
    return [
        "name"=>$this->name,
        "lifepoints"=>$this->lifePoints
        ];
    }

    function useLoadedData($data):void
    {
        // speichert geladene Daten im Ritter
    }
}