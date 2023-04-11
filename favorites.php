<?php
include("includes/include.php");
// redirect the user to the login page if there user id is not in session
if(!isset($_SESSION["UserID"])){
    header("Location: Login.php");
}
?>
<!doctype html>
<html lang=en>

<head>
    <title>Favorites</title>
    <link rel="stylesheet" href="stylesheets/application.css">
    <link rel="stylesheet" type="text/css" href="css/viewrecipes.css">
    <?php include_once("includes/nav.php"); ?>
</head>

<body>
    <?php


        // var_dump($_SESSION);

        // $u = $_SESSION["UserID"];
            // echo "ID: " . $u . " :::";
        



        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        function printLargeImageLogo(){
            // echo "test - function print large image logo: ";
            echo '
            
            <div class="loginLogo row">
                <div class="col">
                    <img src="images/WTFcropped.png" alt="Big WTF Logo">
                </div>
            </div>
        
            ';
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  
    ?>

    <?php       
        printLargeImageLogo();
        // printFavoriteRecipes();
    ?>

    <!-- surrond all -->
    <div class="recipe">
        <?php
                    $Database = new Database();
                    
                    $sqlFavoritesIDs = "SELECT * FROM `user_favorites` WHERE user_id = ". $_SESSION["UserID"] . ";";
                    $sqlUserName = "SELECT `first_name` FROM `user` WHERE user_id = ". $_SESSION["UserID"] . ";";
                        // echo "Valid Sql Statement" . $sql; // query validated
            
                    $returnArray = $Database->selectAssc($sqlFavoritesIDs); // <<<<< this is an array of all the numbers of the user's favorites >>>>>
                    $userName = $Database->selectAssc($sqlUserName);
        
                    // var_dump($returnArray);
                    // var_dump($userName);
        
                    // echo "Here are: " . $userName[0]['first_name'] . "'s Favorite Recipes";
        
                    echo ' 
                    <div class="row noedge">
                    <h3 class="centerText">'.$userName[0]['first_name'].'\'s Favorites</h3>
                    </div> 
                    ';
        
                    $btnCounter = 0;
        
                    foreach($returnArray as $r){
                        // echo "GETTING SOMETHING " . $r["recipe_id"] . "<br>";
            
                        // retrieving the recipe number
                        // echo "GETTING RECIPE NUMBER: " . $r["recipe_id"] . "<br>";
            
                        // call the print recipe card //
                        include_once 'T_RecipeHelper.php';
                        $recipe = new T_RecipeHelper();
                        echo $recipe->printRecipeCard($r["recipe_id"], $btnCounter, true);
                        
            
                        // $recipeNumber =  $r["recipe_id"];
                        // $favoriteRecipes = getRecipe($recipeNumber);
                        echo "<br>";
                        $btnCounter++;
                    }
                    $numberOfCards = sizeof($returnArray);
                    echo "<h1 id='number_of_cards' style='color:red;' hidden>".strval($numberOfCards)."<h1>";
        
        ?>
    </div>

    <!-- TODO STYLING -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="javascripts/favorites.js"></script>
</body>

</html>