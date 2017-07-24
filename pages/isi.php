<?php

$idne = $_GET[IDNE];

//echo $idne;

//exit;

switch ($idne) {
    
    case "single":
        include "single.php";
        break;
    case "blast":
        include "blast.php";
        break;
    case "reminder":
        include "reminder.php";
        break;
    case "auto":
        include "auto.php";
        break;
    case "polling":
        include "polling.php";
        break;
    case "import":
        include "import.php";
        break;
    case "single_action":
        include "single_action.php";
        break;
   default:
        include "home.php";
}







?>