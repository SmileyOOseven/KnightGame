<?php
require('Service/SaveManager.php');

$SaveManager = new SaveManager();

if ($myMode == 1) {                                                    //this if is only the first creation way and works
    require('Service/KnightManager.php');
    $knightManager = new KnightManager();

    $calculatedKnightsArray = $knightManager->createKnights($_POST['knightNumber']);

    $SaveManager->saveKnightJson($calculatedKnightsArray);

    $SaveManager->getKnightsArray();

    $myMode = 2;                                                      //switching the mode into the fight mode

    #echo var_dump($saveManager->knightsArray);
    # echo var_dump($calculatedKnightsArray);

    require('View/gameView.phtml');
    die();
}
if ($myMode == 2) {     //this else should do everytime the same operations until the last case (only one knight alive)

    require_once ('Model/Knight.php');

    require('./Service/FightManager.php');

    $FightManager = new FightManager();

    $knightsArray = $SaveManager->getKnightsArray();

    /*
    if ($knightsArray == 1){

        $XKOUniverse = $knightsArray;
        require('View/winningScreen.phtml');
        die();
    }
    */

    while (count($knightsArray) > 0) {
        $FightManager->getTwoKnights($knightsArray); //delete also (array_pop)

        $FightManager->takeDamage();

        $FightManager->KnightComparsion();

        $FightManager->saveCalculatedKnights();
    }

    //Save the knights after a full fight
    $SaveManager->clearJson();
    $calculatedKnightsArray = $FightManager->calculatedKnightsArray;
    $SaveManager->saveKnightJson($calculatedKnightsArray);

    //set mode to 3 if only one Knight is alive.

    if (count($calculatedKnightsArray) == 1) {
        $myMode = 3;

        $knight = $calculatedKnightsArray[0];
        require ('View/winningScreen.phtml');
        die();
    }
    else {
        $myMode = 2;
    }

    require('View/gameView.phtml');
    die();
}
