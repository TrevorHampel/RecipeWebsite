<?php

include_once "DatabaseObjects/M_recipe.php";
include_once "DatabaseObjects/M_recipe_ingredient_link.php";
include_once "DatabaseObjects/M_ingredient.php";
include_once "DatabaseObjects/M_measurement_unit.php";
include_once "DatabaseObjects/M_measurement.php";
include_once "DatabaseObjects/M_recipe_tag.php";
include_once "Database.php";
include("includes/include.php");


class T_AddRecipe
{
    function addRecipe($name, $type_id, $area_id, $image, $source, $video, $instructions)
    {
        $Database = new Database();

        $date = date('Y/m/d H:i:s');
        //$checkIfExists = $Database->selectAssc($checkSQL);
        if (empty($checkIfExists) === false) {
            return "false";
        }
        $sql = "INSERT INTO recipes (recipe_name, type_id, area_id, image, source_url, youtube_url, date_created, instructions)
        VALUES ($name, $type_id, $area_id, $image, $source, $video, $date, $instructions)";
        $Database->insert($sql);
        return true;
    }
}
