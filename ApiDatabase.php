<?php

include_once "DatabaseObjects/M_recipe.php";
include_once "DatabaseObjects/M_recipe_ingredient_link.php";
include_once "DatabaseObjects/M_ingredient.php";
include("includes/include.php"); 
//use DatabaseObjects\M_user;



$recipesArray = getRecipeFromAPI(52830); // a random recipe as of 2022.10.22 - 6:04pm ref the include file

$imgThumb = $recipesArray[0]['strMealThumb'];
$id = $recipesArray[0]['idMeal'];
$meal = $recipesArray[0]['strMeal'];
$category = $recipesArray[0]['strCategory'];
$area = $recipesArray[0]['strArea'];
$instructions = $recipesArray[0]['strInstructions'];
//$UserID = $_SESSION['UserID'];
$ingredients = [];
$video = $recipesArray[0]['strYoutube'];
$source = $recipesArray[0]['strSource'];

foreach ($recipesArray as $r) {

    for ($i = 1; $i < 21; $i++) {
        $strIng = 'strIngredient' . $i;
        $strMeas = 'strMeasure' . $i;

        if ($r[$strIng] == "") {
            break;
        }
        $ingredients += [$r[$strIng] => $r[$strMeas]];
    }
}

$userObj = new M_recipe();
$userObj->recipe_id = $id;
$userObj->recipe_name = $meal;
$userObj->image = $imgThumb;
$userObj->source_url  = $source;
$userObj->youtube_url = $video;
$date = new \DateTime('now');
$userObj->date_created  = $date->format('Y/m/d H:i:s');
$userObj->recipe_instructions  = $instructions;

foreach ($recipesArray as $r) {

    for ($i = 1; $i < 21; $i++) {
        $strIng = 'strIngredient' . $i;
        $strMeas = 'strMeasure' . $i;

        if ($r[$strIng] == "") {
            break;
        }
        $ingredients += [$r[$strIng] => $r[$strMeas]];
    }
}

foreach($ingredients as $row)
{
    $ingredients = new M_ingredient();
    $ingredients->
    $recipesArray[0]["strIngredient$i"];
    $recipesArray[0]["strMeasure$i"];
}


ob_start();
var_dump($userObj); // output txt here
error_log(ob_get_clean()."\n",3,'C:/xampp/htdocs/RecipeWebsite/output.txt');



