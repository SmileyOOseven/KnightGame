<?php

class Knight
{
    //properties
    private string $name;
    private int $lifePoints;

    function __construct($name = "Harald", $lifePoints = 100) //was soll alles in construct rein, sollte ich diese function mit der nächsten (setName), genau wie (setStartLifepoints), zusammenfassen?
    {
        $this->name = $name;
        $this->lifePoints = $lifePoints;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLifepoints(): int
    {
        return $this->lifePoints;
    }

    private function bloodlust(int $minLife = 1, int $maxLife = 25): void
    {
        $this->lifePoints = rand($minLife, $maxLife);
    }

    public function takeDamage($damage): void
    {
        $this->lifePoints -= $damage;
    }

    public function triggerBloodlust($minLife = 0): void
    {
        if ($this->lifePoints <= $minLife) {
            $this->bloodlust();
        }
    }


    public function giveDamage(int $min = 1, int $max = 90): int
    {
        return rand($min, $max);
    }

    public function getSaveData(): array
    {
        return [
            "name" => $this->name,
            "lifepoints" => $this->lifePoints
        ];
    }
}