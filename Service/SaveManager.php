<?php


class SaveManager
{
    private string $jsonSaveFile = __DIR__ . "/../saves/saveKnight.json"; //with "__DIR__" is this File the path reference  not longer the index

    private array $knightsArrayUnconverted; //save exact the content out of save Json

    private array $knightsArray; //save content out of save json converted to class knight

    public int $progressMode;


    public function clearJson(): void{
        file_put_contents($this->jsonSaveFile, json_encode([]));
    }

    private function readKnightJson(): void //eine while schleife machen welche das ganze zu einem array aus knights macht
    {
        $this->knightsArrayUnconverted = json_decode(file_get_contents($this->jsonSaveFile));
     }


    private function knightClassConverter(): void
    {
        $this->readKnightJson();

        foreach ($this->knightsArrayUnconverted as $knight) {
            $arrayWhichGetMoved = array_shift($this->knightsArrayUnconverted);
            $Knight = new Knight(
                $arrayWhichGetMoved->name,
                $arrayWhichGetMoved->lifepoints
            );
            $this->knightsArray[] = $Knight;
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
        file_put_contents($this->jsonSaveFile, json_encode($data));
    }
    public function saveProgress($progressMode): void
    {
        file_put_contents($this->jsonSaveFile, json_encode($progressMode));
    }
}