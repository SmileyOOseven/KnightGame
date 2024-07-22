<?php

class SaveManager
{
    private const JSONSAVEFILE = __DIR__ . "/../saves/saveKnight.json"; //with "__DIR__" is this File the path reference  not longer the index

    private array $knightsArray; //save content out of save json converted to class knight

    private function readKnightJson(): array
    {
        return json_decode(file_get_contents(self::JSONSAVEFILE));
    }

    private function knightClassConverter(): void
    {
        $knightsArrayUnconverted = $this->readKnightJson();

        foreach ($knightsArrayUnconverted as $knight) {
            $knight = array_pop($knightsArrayUnconverted);
            $knightObject = new Knight(
                $knight->name,
                $knight->lifepoints
            );
            $this->knightsArray[] = $knightObject;
        }
    }

    public function getKnightsArray(): array
    {
        $this->knightClassConverter();
        return $this->knightsArray;
    }

    public function saveKnightJson($calculatedKnightsArray): void
    {
        $data = [];

        foreach ($calculatedKnightsArray as $singleKnight) {
            $data[] = $singleKnight->getSaveData();
        }
        file_put_contents(self::JSONSAVEFILE, json_encode($data));
    }
}