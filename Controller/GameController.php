<?php
require('Service/SaveManager.php');

$SaveManager = new SaveManager();

if ($myMode == STARTPAGE) {                                                    //this if is only the first creation way and works
    require('Service/KnightManager.php');
    $knightManager = new KnightManager();

    $knightsArray = $knightManager->createKnights($_POST['knightNumber']);

    $SaveManager->saveKnightJson($knightsArray);

    $myMode = GAMEPAGE;                                                      //switching the mode into the fight mode

    require('View/gameView.phtml');
    die();
}
if ($myMode == GAMEPAGE) {     //this else should do everytime the same operations until the last case (only one knight alive)
    require_once('Model/Knight.php');

    require('./Service/FightManager.php');

    $knightsArray = $SaveManager->getKnightsArray();

    $fightManager = new FightManager($knightsArray);

    $numberOfFights = count($knightsArray) / 2;
    do {
        $fightManager->doFight();
    } while (--$numberOfFights > 0);

    //Save the knights after a full fight
    $knightsArray = $fightManager->getWinners();
    $SaveManager->saveKnightJson($knightsArray);

    if (count($knightsArray) === 1) {
        $myMode = STARTPAGE;

        $knight = $knightsArray[0];
        require('View/winningScreen.phtml');
        die();
    }

    require('View/gameView.phtml');
    die();
}