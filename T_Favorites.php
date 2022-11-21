<?php

include_once "Database.php";
include_once "Session.php";
$Database = new Database();

class T_Favorites {
    function addToFavorites($recipeID, $userID){
        $Database = new Database();
        $sql = "INSERT INTO user_favorites (user_id, recipe_id)
        VALUES ($userID, $recipeID)";
        $Database->insert($sql);
        return true;
    }
}

