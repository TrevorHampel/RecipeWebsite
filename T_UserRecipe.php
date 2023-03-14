<?php

include_once "Database.php";

class T_UserRecipe
{

    static function getUserRecipeIDArray($user_id)
    {
        $Database = new Database();
        $sql = "SELECT recipe_id FROM recipe  
        WHERE user_id =  $user_id";
        $returnArray = $Database->selectAssc($sql);
        return $returnArray;
    }
}