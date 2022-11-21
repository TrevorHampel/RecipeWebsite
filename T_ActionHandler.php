<?php
include_once "T_Login.php";
include_once "T_Favorites.php";

if(isset($_POST['action'])){
    switch ($_POST['action']) {
        case "CheckLogin":
            $T_Login = new T_Login();
            echo $T_Login->checkLogin($_POST['username'], $_POST['password']);
            break;
        case "CreateAccount":
            $T_Login = new T_Login();
            echo $T_Login->createAccount($_POST['username'], $_POST['password'],$_POST['first'], $_POST['last']);
            break; 
        case "AddToFavorites":
            $T_Favorites = new T_Favorites();
            echo $T_Favorites->addToFavorites($_POST["recipeID"], $_POST["userID"]);
            break;
    }
    // always be sure to exit(); or echo exit;
    exit();
}

