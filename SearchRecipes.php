<?php 
include("includes/include.php"); 
// redirect the user to the login page if there user id is not in session
if(!isset($_SESSION["UserID"])){
    header("Location: Login.php");
}

function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Search Recipes</title>
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

    <h1 class="centerText">Search Recipes</h1>

    <div class="d-flex align-items-center justify-content-center">

        <form method="post" action="">
            <label for="recipeSearch" class="m-1">Enter all or part of the name of a recipe:</label>
            <div class ="container-fluid">
                <div class ="row">
                    <div class ="col-md-9 col-sm-9">
                        <input type="text" name="searchText" class="form-control" id="searchText" placeholder="Enter Your Search" required />
                    </div>
                    <div class ="col-md-3 col-sm-3">
                        <input type="submit" name="search" value="Search" class="justify-content-center">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['search'])) {
        if (!empty($_POST['searchText'])) {
            $print_var = '<h1 class="h1 text-center space">Search results for: ';
            $print_var .= $_POST['searchText'];
            $print_var .= '</h1>';
            echo $print_var;
        }
    }
    ?>

    <div class="recipe">
        <?php
        if (isset($_POST['search'])) {
            if (!empty($_POST['searchText'])) {
                // printRecipeGrid($_POST['categories']);
                $Database = new Database();
                $searchText = validateInput($_POST['searchText']);
                $sqlRecipeIds = "SELECT * FROM recipe WHERE recipe_name LIKE '%". $searchText . "%';";
                $returnArray = $Database->selectAssc($sqlRecipeIds); // <<<<< this is an array of all the numbers of the user selected category >>>>>

                $btnCounter = 0;

                foreach($returnArray as $r){
                    // call the print recipe card //
                    include_once 'T_RecipeHelper.php';
                    $recipe = new T_RecipeHelper();
                    echo $recipe->printRecipeCard($r["recipe_id"], $btnCounter, false);
                    
        
                    // $recipeNumber =  $r["recipe_id"];
                    // $favoriteRecipes = getRecipe($recipeNumber);
                    echo "<br>";
                    $btnCounter++;
                }
                $numberOfCards = sizeof($returnArray);
                echo "<h1 id='number_of_cards' style='color:red;' hidden>".strval($numberOfCards)."<h1>";
            }
        }
        //printCategories();
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="javascripts/favorites.js"></script>

</body>

</html>