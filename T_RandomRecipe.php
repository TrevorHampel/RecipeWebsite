<?php

include_once "Database.php";

class T_RandomRecipe
{

    static function getRandomRecipeID()
    {
        $Database = new Database();
        $sql = "SELECT recipe_id FROM recipe  
        ORDER BY RAND()  
        LIMIT 1 ";
        $returnArray = $Database->selectAssc($sql);
        return $returnArray[0]["recipe_id"];
    }

    static function getTenRandomRecipeID()
    {
        $Database = new Database();
        $sql = "SELECT * FROM recipe  
        ORDER BY RAND()  
        LIMIT 10 ";
        $returnArray = $Database->selectAssc($sql);
        return $returnArray;
    }
}