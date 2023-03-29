<?php 
include("includes/include.php"); 
// redirect the user to the login page if there user id is not in session
if(!isset($_SESSION["UserID"])){
    header("Location: Login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>10 Random Recipes</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/application.css">
    <link rel="stylesheet" type="text/css" href="css/viewrecipes.css">
</head>

<body>
    <?php include_once("includes/nav.php"); ?>

    <div class="loginLogo row">
        <div class="col">
            <img src="images/WTFcropped.png" alt="Big WTF Logo">
        </div>
    </div>

    <h1 class="h1 text-center">10 Random Recipes</h1>

    <!-- Single example card used for testing without the php
    <div class="d-flex align-items-center justify-content-center">
        <div class="card w-50 m-5 p-2 border rounded list">
            <div class="row center">
                <a href="!!!TODO route to viewrecipies.php page using this recepie!!!">
                    <h2 class="card-title">Clam chowder</h2>
                    <p class="card-text">Recepie type: Starter</p>
                    <img class="card-img-top border rounded" src="https://www.themealdb.com/images/media/meals/rvtvuw1511190488.jpg" alt="clamChowderImg">
                </a>
                <a>
                    <button type="button" class="btn btn-primary btn-md m-3">Add to Favorites</button></a>
                <a href="' . $recipe->getRecipeVideo() . '">
                    <button type="button" class="btn btn-danger btn-md m-3">Recipe Video</button></a>
                <a href="' . $recipe->getRecipeSource() . '">
                    <button type="button" class="btn btn-primary btn-md m-3">Original Recepie</button></a>
            </div>
        </div>
    </div>
    -->

    
        <?php
        $UserId = $_SESSION['UserID'];
        $recipe_array = parseRecipe(getRecipeFromAPI(0));
        $print_var = '<div class="card w-50 m-5 p-2 border rounded list">';
        $btnCounter = 0;
        include_once 'T_RecipeHelper.php';
        $recipeObject = new T_RecipeHelper();
        $favOrNot = false;
        echo "<div class='recipe'>";
        foreach ($recipe_array as $recipe) 
        {
            echo $recipeObject->printRecipeCard($recipe->getId(), $btnCounter, $favOrNot);
            $btnCounter++;
            // Commented out because it was printing the recipes again the old way after printRecipeCard already printed them
            // $print_var .= '<div class="row center">';
            //     $print_var .= '<a href="!!!TODO route to viewrecipies.php page using this recepie!!!">';
            //         $print_var .= '<h3 class="card-title">' . $recipe->getName() . '</h3>';
            //         $print_var .= '<p class="card-text">Recipe type: ' . $recipe->getCategory() . '</p>';


            //         $print_var .= '<img class="card-img-top border rounded img-fluid" src="' . $recipe->getThumbnail() . '" alt="' . $recipe->getName() . '"></a>';
            // $print_var .= '</div>';
        
            // $print_var .= '<div class="row center">';
            //     $print_var .= "<a><button type='button' class='btn btn-primary btn-md m-3' onclick='addToFavoritesList(" . $recipe->getId() . ", $UserId)'>Add to Favorites</button></a>";
            // $print_var .= '</div>';

            // $print_var .= '<hr class="row bar">';
        }
        echo "</div>";
        // Remove last <hr>
        $print_var = substr($print_var, 0, -20);

        // $print_var .= '</div>';
        $numberOfCards = sizeof($recipe_array);
        echo "<h1 id='number_of_cards' style='color:red;' hidden>".strval($numberOfCards)."<h1>";
        // echo $print_var;

        ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="javascripts/favorites.js"></script>
</body>

</html>