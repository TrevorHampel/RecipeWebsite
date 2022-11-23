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
    <?php include_once("includes/nav.php"); ?>
</head>

<body>
    <?php


        // var_dump($_SESSION);

        // $u = $_SESSION["UserID"];
            // echo "ID: " . $u . " :::";
        
        function printFavoriteRecipes(){

            $Database = new Database();
            $Database2 = new Database();
            
            $sqlFavoritesIDs = "SELECT * FROM `user_favorites` WHERE user_id = ". $_SESSION["UserID"] . ";";
            $sqlUserName = "SELECT `first_name` FROM `user` WHERE user_id = ". $_SESSION["UserID"] . ";";
                // echo "Valid Sql Statement" . $sql; // query validated
    
            $returnArray = $Database->selectAssc($sqlFavoritesIDs); // <<<<< this is an array of all the numbers of the user's favorites >>>>>
            $userName = $Database2->selectAssc($sqlUserName);

            // var_dump($returnArray);
            // var_dump($userName);

            // echo "Here are: " . $userName[0]['first_name'] . "'s Favorite Recipes";

            echo ' 
            <div class="row noedge">
            <h3 class="centerText">'.$userName[0]['first_name'].'\'s Favorites</h3>
            </div> 
            ';

            foreach($returnArray as $r){
                // echo "GETTING SOMETHING " . $r["recipe_id"] . "<br>";
    
                // retrieving the recipe number
                // echo "GETTING RECIPE NUMBER: " . $r["recipe_id"] . "<br>";
    
                // call the print recipe card //
                printRecipeCard($r["recipe_id"]); // <<< INTEDING to pass that id to print the array from the list of favorite by recipe id >>>>>
    
                // $recipeNumber =  $r["recipe_id"];
                // $favoriteRecipes = getRecipe($recipeNumber);
                echo "<br>";
    
            }

        }


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

        function printRecipeCard($recipeNumber){
            echo '<hr class="row bar">';
            $recipesArray = new Recipe();

            $recipesArray = getRecipe($recipeNumber); // getRecipe returns a recipe ||| $Recipe = new Recipe(); get recipe is returning an array

            foreach ($recipesArray as $r) {
                // PORTION THAT CONSIST OF THE OUTER SEGMENT OF THE CARDS //
                
                // ECHO NAME OF RECIPE //
                echo ' 
                <div class="row noedge">
                <h2 class="centerText">'.$r->getName().'</h2>
                </div> 
                ';

                // ECHO THE IMAGE //
                echo '
                <div class="row noedge">
                <div class="col">
                <img src="'.$r->getThumbnail().'">
                </div>
                ';

                $ingredients = $r->getIngredients();
                
                // <<< INGREDIENTS PRINTING SEGEMENT >>> //
                // ECHO LIST OF INGREDIENTS //

                echo '
                <div class="col">
                <h3>INGREDIENTS:</h2>
                ';

                foreach($ingredients as $k => $v)  {
                    echo '<div class="row checkbox">';
                    echo '<div class="col-1">';
                    echo '
                        <input type="checkbox" 
                            name="'.$k.'" 
                            value="'.$v.'">
                             
                    ';
                    echo '</div>';
                        echo '<div class="col-11">';
                            echo 
                                "<p>" .
                                    $k . " : " .
                                    $v .
                                "</p>";
                        echo '</div>';
                    echo '</div>';
                }


                echo'
                </div>
                <!-- end ingredients segment  -->
                </div>
                ';

                echo '
                <!-- instructions segment start  -->
                <div>
                    <h2>INSTRUCTIONS:</h2>
                    <p>'.$r->getInstructions().'</p>
                </div>
                <!-- end instructions segment  -->   
                <br>
                ';

            }

        }
  
    ?>

    <?php       
        printLargeImageLogo();
        // printFavoriteRecipes();
    ?>

    <!-- surrond all -->
    <div class="recipe">
        <?php
        printFavoriteRecipes();
        ?>
    </div>

    <!-- TODO STYLING -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>