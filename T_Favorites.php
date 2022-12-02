<?php

include_once "Database.php";
include_once "Session.php";
$Database = new Database();

class T_Favorites {
    function addToFavorites($recipeID, $userID){
        $Database = new Database();
        $sql = "SELECT * FROM user_favorites WHERE recipe_id = $recipeID AND user_id = $userID";
        $checkIfExists = $Database->selectAssc($sql);
        if(empty($checkIfExists) === false){
            return "false";
        }
        $sql = "INSERT INTO user_favorites (user_id, recipe_id)
        VALUES ($userID, $recipeID)";
        $Database->insert($sql);
        return "true";
    }

    function removeFromFavorites($recipeID, $userID){
        $Database = new Database();
        $sql = "DELETE FROM user_favorites 
        WHERE user_id = $userID
        AND recipe_id = $recipeID";
        $Database->delete($sql);
        return true;
    }
}

