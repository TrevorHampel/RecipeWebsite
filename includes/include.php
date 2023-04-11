<?php
include_once('Session.php');
include_once('Database.php');
include_once('Recipe.php');
include_once('auth.php');

/**
 * Calls the MealDB using cURL. Has 3 input options
 * if $id < 0 a single random recipe is returned
 * if $id > 0 a recipe is returned matching the recipe's ID
 * if $id == 0 10 random recipes are returned
 * 
 * @param int $id 
 * @return mixed $recipe_obj['meals']
 */

function getRecipeFromAPI($id)
{
    $key = auth;

    if ($id < 0) {
        $urlRandom = "https://www.themealdb.com/api/json/v2/" . $key . "/random.php";
    }
    if ($id > 0) {
        $urlRandom = "https://www.themealdb.com/api/json/v2/" . $key . "/lookup.php?i=" . $id;
    }
    if ($id == 0) {
        $urlRandom = "https://www.themealdb.com/api/json/v2/" . $key . "/randomselection.php";
    }


    $curl_handle = curl_init();

    curl_setopt($curl_handle, CURLOPT_URL, $urlRandom);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

    $recipe_data = curl_exec($curl_handle);

    curl_close($curl_handle);

    $recipe_obj = json_decode($recipe_data, true);

    return $recipe_obj['meals'];
}

function getRecipeFromLetter($letter)
{
    $key = auth;
    $urlRandom = "https://www.themealdb.com/api/json/v2/" . $key . "/search.php?f=" . $letter;


    $curl_handle = curl_init();

    curl_setopt($curl_handle, CURLOPT_URL, $urlRandom);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

    $recipe_data = curl_exec($curl_handle);

    curl_close($curl_handle);

    $recipe_obj = json_decode($recipe_data, true);

    return $recipe_obj['meals'];
}


/**
 * Takes in an array of json recipes and parses them into Recipe objects to be displayed
 * Returns an array of Recipe objects
 *
 * @param array $recipes
 * @return array
 */
function parseRecipe($recipes = array())
{
    //$recipe_array[] = new Recipe();

    $ingredients = [];
    if(is_array($recipes))
    {
        foreach ($recipes as $r) {
            $Recipe = new Recipe();
            $Recipe->setId($r['idMeal']);
            $Recipe->setName($r['strMeal']);
            $Recipe->setCategory($r['strCategory']);
            $Recipe->setThumbnail($r['strMealThumb']);
            $Recipe->setInstructions($r['strInstructions']);
            $Recipe->setRecipeVideo($r['strYoutube']);
            $Recipe->setRecipeSource($r['strSource']);

            for ($i = 1; $i < 21; $i++) {
                $strIng = 'strIngredient' . $i;
                $strMeas = 'strMeasure' . $i;

                if ($r[$strIng] == "") {
                    break;
                }
                $ingredients += [$r[$strIng] => $r[$strMeas]];
            }
            $Recipe->setIngredients($ingredients);
            $recipe_array[] = $Recipe;
        }
    }
    else
    {
        $recipe_array = array();
    }

    return $recipe_array;
}

/**
 * returns a single Recipe object by id, or
 * if param is negative a random Recipe object is returned
 *
 * @param [type] $i recipe id or negative for random
 * @return Recipe
 */
function getRecipe($i)
{
    $Recipe = new Recipe();
    if ($i < 0) {
        $Recipe = parseRecipe(getRecipeFromAPI($i));
        return $Recipe[0];
    }
    if ($i > 0) {
        $Recipe = parseRecipe(getRecipeFromAPI($i));
    }
    return $Recipe;
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
