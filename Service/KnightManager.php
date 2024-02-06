<?php
require('Model/Knight.php');

class KnightManager
{
    public array $knightsArray = [];

    function createKnights(int $userInput): array
    {
        for ($i = 1; $i <= $userInput; $i++) {
            $knight = new Knight("Ritter" . $i);
            $this->knightsArray[] = $knight;
        }

        return $this->knightsArray;
    }
}