<?php include("includes/include.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <title>User Recipes</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/application.css">
</head>

<body>
    <?php include_once("includes/nav.php"); ?>

    <div class="loginLogo row">
        <div class="col">
            <img src="images/WTFcropped.png" alt="Big WTF Logo">
        </div>
    </div>

    <h1 class="h1 text-center">User Recipes</h1>

    
        <?php
        $UserId = $_SESSION['UserID'];
        $recipe_array = parseRecipe(getRecipeFromAPI(0));
        //$print_var = '<div class="card w-50 m-5 p-2 border rounded list">';
        $btnCounter = 0;
        include_once 'T_UserRecipe.php';
        include_once 'T_RecipeHelper.php';
        include_once 'DatabaseObjects/M_recipe.php';
        $userRecipeArray = T_UserRecipe::getUserRecipeIDArray($UserId);
        echo "<div class='recipe'>";
        foreach ($userRecipeArray as $recipeID) 
        {
            echo T_RecipeHelper::printRecipeCardDatabaseObject($recipeID["recipe_id"], $btnCounter);
            $M_recipe = new M_recipe($recipeID["recipe_id"]);
            $btnCounter++;
            // $print_var .= '<div class="row center">';
            //     $print_var .= '<a href="!!!TODO route to viewrecipies.php page using this recepie!!!">';
            //         $print_var .= '<h3 class="card-title">' . $M_recipe->recipe_name . '</h3>';
            //         $print_var .= '<p class="card-text">Recipe type: ' . $M_recipe->recipe_type . '</p>';

            //         $print_var .= '<img class="card-img-top border rounded img-fluid" src="' . $M_recipe->image . '" alt="' . $M_recipe->recipe_name . '"></a>';
            // $print_var .= '</div>';
        }
        echo "</div>";
        //$print_var = substr($print_var, 0, -20);

        //$print_var .= '</div>';
        $numberOfCards = sizeof($recipe_array);
        echo "<h1 id='number_of_cards' style='color:red;' hidden>".strval($numberOfCards)."<h1>";
        //echo $print_var;
        ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="javascripts/favorites.js"></script>
</body>

</html>