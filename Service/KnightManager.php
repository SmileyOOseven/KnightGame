<?php
require('Model/Knight.php');

class KnightManager
{
    public function createKnights(int $userInput): array
    {
        $knightsArray = [];

        for ($i = 1; $i <= $userInput; $i++) {
            $knight = new Knight("Ritter" . $i);
            $knightsArray[] = $knight;
        }

        return $knightsArray;
    }
}