<?php
include_once('Database.php');

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

/**
 * displayImage echo's out an image element in HTML
 *
 * @param string $path
 * @return void
 */
function displayImage($path)
{
    echo '<img src="' . $path . '" width="400" height="400"';
}

/**
 * hashPass hashes the password for a user
 *
 * @param string $uIn
 * @param string $pIn
 * @return string
 */
function hashPass($uIn, $pIn)
{
    $salt1 = 'n239v[d98q3hqv';
    $salt2 = '349uvnd;f]wefv';

    $saltedU = $salt1 . $uIn . $salt2;
    $saltedU2 = $salt2 . $uIn . $salt1 . $salt1;

    $salt3 = hash('sha512', $saltedU);
    $salt4 = hash('sha512', $saltedU2);

    $saltedP = $salt3 . $pIn . $salt4;
    $saltedP = hash('sha512', $saltedP);

    return $saltedP;
}

/**
 * Checks the inputted username against the database for existing accounts
 *
 * @param string $name
 * @return boolean
 */
function isUsernameAvailable($name)
{
    $Database = new Database();
    $sql = 'SELECT username FROM user';
    $users = $Database->selectAssc($sql);
    foreach ($users as $user) {
        //var_dump($user);
        echo '<br><br>';
        var_dump($user["username"]);
        echo '<br><br>';
        if ($name == $user['username']) return false;
    }
    return true;
}
