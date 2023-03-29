<?php
include_once "T_Hash.php";
include_once "T_Login.php";
include_once "T_Favorites.php";
include_once "T_CreateAccount.php";


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "CheckLogin":
            $T_Login = new T_Login();
            $T_Hash = new T_Hash();
            $newHashPass = $T_Hash->hashPass($_POST['password']);
            echo $T_Login->checkLogin($_POST['username'], $newHashPass);
            break;
        case "CreateAccount":
            $T_CreateAccount = new T_CreateAccount();
            echo $T_CreateAccount->createAccount($_POST['username'], $_POST['password'], $_POST['first'], $_POST['last']);
            break;
        case "AddToFavorites":
            $T_Favorites = new T_Favorites();
            echo $T_Favorites->addToFavorites($_POST["recipeID"], $_POST["userID"]);
            break;
        case "RemoveFromFavorites":
            $T_Favorites = new T_Favorites();
            echo $T_Favorites->removeFromFavorites($_POST["recipeID"], $_POST["userID"]);
            break;
    }
    // always be sure to exit(); or echo exit;
    exit();
}
