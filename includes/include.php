<?php
function hellowWorld()
{
    $msg = "Hello World!";
    echo '<h2>Testing out functions here my guy</h2>';
    echo '<h3>' . $msg . '</h3>';
}

function parseJSON($file)
{
    $raw_json = file_get_contents($file);
    $parsed_json = json_decode($raw_json, false);

    echo '<h2>' . $parsed_json->meals[0]->strMeal . '</h2><br>';
    echo '<h3>' . $parsed_json->meals[0]->strCategory . '</h3><br>';
    echo '<p>' . $parsed_json->meals[0]->strInstructions . '</p><br>';
    echo '<ul>';


    echo '<li>' . $parsed_json->meals[0]->strMeasure1 . " - " . $parsed_json->meals[0]->strIngredient1 .  '</li>';
    echo '<li>' . $parsed_json->meals[0]->strMeasure2 . " - " . $parsed_json->meals[0]->strIngredient2 .  '</li>';
    echo '<li>' . $parsed_json->meals[0]->strMeasure3 . " - " . $parsed_json->meals[0]->strIngredient3 .  '</li>';
    echo '<li>' . $parsed_json->meals[0]->strMeasure4 . " - " . $parsed_json->meals[0]->strIngredient4 .  '</li>';
    echo '<li>' . $parsed_json->meals[0]->strMeasure5 . " - " . $parsed_json->meals[0]->strIngredient5 .  '</li>';
    echo '<li>' . $parsed_json->meals[0]->strMeasure6 . " - " . $parsed_json->meals[0]->strIngredient6 .  '</li>';
    echo '<li>' . $parsed_json->meals[0]->strMeasure7 . " - " . $parsed_json->meals[0]->strIngredient7 .  '</li></ul>';


    displayImage($parsed_json->meals[0]->strMealThumb);
}

function displayImage($path)
{
    echo '<img src="' . $path . '" width="400" height="400"';
}
