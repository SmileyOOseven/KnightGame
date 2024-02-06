<?php

/*
 * Explanation of the modes: thy get set whenever an other game phase starts
 *
 * mode 0 = default
 * mode 1 = startpage
 * mode 2 = gamepage
 * mode 3 = winpage
 */


$myMode = $_POST['mode'] ?? 0;

if (isset($_POST['knightNumber'])) {
    $countOfKnights = $_POST['knightNumber'];
}

if ($myMode == 2 || $myMode == 3) {
    require('GameController.php');
}

if (isset ($countOfKnights)) {
        require_once('Service/ConditionManager.php');
        $ConditionManager = new  ConditionManager;
        $isNumberInCondition = $ConditionManager->isPotencyOfTwo($countOfKnights);
        if (is_numeric($countOfKnights) && $isNumberInCondition)
            $myMode = 1;                                                                            //switching in the first mode
        require('GameController.php');
} else {
    //http_response_code(400);
    require('View/startView.phtml');
    die();
}

if ($myMode == 0) {
    require('View/startView.phtml');
    die();
}