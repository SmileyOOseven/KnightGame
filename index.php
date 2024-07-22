<?php

enable_errorMessages(false);

require('Controller/StartController.php');

function enable_errorMessages($showMessages = false): void
{
    if(!$showMessages){
        return;
    }
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}