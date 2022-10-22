<?php

if(isset($_POST['action'])){
    switch ($_POST['action']) {
        case "CheckLogin":
            break;
        case "GetSecondThing":
            echo "Number:" . $_POST['number'] . " \nString:" .  $_POST['ThisIsJustAVar'] ;
            break;
    }
    // always be sure to exit(); or echo exit;
    exit();
}

