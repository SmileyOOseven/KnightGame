<?php


//Each mode is clearly assigned to a display page or its data to be transmitted

const STARTPAGE = '1';
const GAMEPAGE = '2';
const WINPAGE = '3';

$myMode = $_POST['mode'] ?? STARTPAGE;
$countOfKnights = $_POST['knightNumber'] ?? null;

if ($myMode == GAMEPAGE || $myMode == WINPAGE) {
    require('GameController.php');
}

if ($countOfKnights !== null) {
    require_once('Service/ConditionManager.php');
    $ConditionManager = new  ConditionManager;
    $isNumberValid = $ConditionManager->isPotencyOfTwo($countOfKnights);

    if ($isNumberValid) {
        require('GameController.php');
    }
}

require('View/startView.phtml');
die();