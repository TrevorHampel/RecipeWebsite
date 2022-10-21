<?php
include_once('Database.php');
include_once('Recipe.php');

/**
 * Uses cURL to retrieve a random recipe from theMealDB 
 * as an associative array.
 * 
 * @return array $recipe_obj['meals']
 */

function getRecipeFromAPI()
{
    $curl_handle = curl_init();

    $urlRandom = "https://www.themealdb.com/api/json/v1/1/random.php";

    curl_setopt($curl_handle, CURLOPT_URL, $urlRandom);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

    $recipe_data = curl_exec($curl_handle);

    curl_close($curl_handle);

    $recipe_obj = json_decode($recipe_data, true);

    return $recipe_obj['meals'];
}

/**
 * Takes in an array of json recipes and parses them into Recipe objects to be displayed
 *
 * @param array $recipes
 * @return array
 */
function parseRecipe($recipes)
{
    $recipe_array = [];

    $ingredients = [];
    foreach ($recipes as $r) {
        $Recipe = new Recipe();
        $Recipe->setId($r['idMeal']);
        $Recipe->setName($r['strMeal']);
        $Recipe->setCategory($r['strCategory']);
        $Recipe->setThumbnail($r['strMealThumb']);
        $Recipe->setInstructions($r['strInstructions']);

        for ($i = 1; $i < 21; $i++) {
            $strIng = 'strIngredient' . $i;
            $strMeas = 'strMeasure' . $i;

            if ($r[$strIng] == "") {
                break;
            }
            $ingredients += [$r[$strIng] => $r[$strMeas]];
        }
        $Recipe->setMap($ingredients);
        $recipe_array += [$Recipe];
    }
    var_dump($Recipe);
    return $recipe_array;
}


/**
 * hashPass hashes the password for a user
 *
 * @param string $uIn username
 * @param string $pIn password as plain text input
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
