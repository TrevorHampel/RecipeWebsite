<?php
// include_once("includes/include.php");
include_once "Session.php";
include_once "T_RandomRecipe.php";
include_once "DatabaseObjects/M_recipe.php";
// include_once "DatabaseObjects/M_recipe_ingredient_link.php";
// include_once "DatabaseObjects/M_ingredient.php";

?>
<!doctype html>
<html lang=en>

<head>
    <title>View Recipes</title>
    <link rel="stylesheet" href="stylesheets/application.css">
    <link rel="stylesheet" type="text/css" href="css/viewrecipes.css">
    <?php include_once("includes/nav.php"); ?>
</head>

<body>
    <?php
    $randId = T_RandomRecipe::getRandomRecipeID();
    $recipe = new M_recipe($randId);
    $imgThumb = $recipe->image;
    $id = $recipe->recipe_id;
    $meal = $recipe->recipe_name;
    $category = $recipe->recipe_type;
    $area = $recipe->recipe_area;
    $instructions = $recipe->recipe_instructions;
    $UserID = $_SESSION['UserID'];
    $ingredients = [];
    $video = $recipe->youtube_url;
    $source = $recipe->source_url;

    ?>

    <div class="loginLogo row">
        <div class="col">
            <img src="images/WTFcropped.png" alt="Big WTF Logo">
        </div>
    </div>

    <h1 class="centerText">
        <button class="button-random-recipe">
            <a class="button-random-recipe-anchor-text" href="./viewrecipes.php" ">CLICK FOR NEW RANDOM RECIPE</a>
        </button>
    </h1>

    <!-- surrond all -->
    <div class=" recipe">
                <!-- img segment start  -->
                <div class="row noedge">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <h2 class="centerText">MEAL: <?php echo " " . $meal ?></h2>
                    </div>
                </div>

                <div class="row noedge">
                    <div class="col">
                        <img src="<?php echo $imgThumb ?>">
                    </div>
                    <!-- ingredients segment start  -->
                    <div class="col">
                        <h3>INGREDIENTS:</h2>
                            <?php
                            $i = 1;
                            foreach($recipe->recipe_ingredient_link as $row)
                            {
                                echo '<div class="row checkbox">';
                                echo '<div class="col-1">';
                                echo '<input type="checkbox"
                                name="' . $row->ingredient_id->ingredient_value . '" 
                                value="' . $row->ingredient_id->ingredient_value . '">';
                                echo '</div>';
                                echo '<div class="col-11">';
                                echo "<p>" .
                                    $row->ingredient_id->ingredient_value . " : " .
                                    $row->measurement_id->measurement_value . " " . $row->measurement_id->measurement_unit_id->measurement_unit_value .
                                    "</p>";
                                echo '</div>';
                                echo '</div>';
                                $i++;
                            }

                            ?>
                    </div>
                    <!-- end ingredients segment  -->
                </div>
                <!-- end img segment  -->

                <div>
                    <?php
                    echo '<a href="' . $source . '"><button type="button" class="btn btn-primary btn-md m-3">Recipe Source</button></a>';
                    echo '<a href="' . $video . '"><button type="button" class="btn btn-danger btn-md m-3">Recipe Video</button></a>';
                    echo "<a><button type='button' class='btn btn-primary btn-md m-3' onclick='addToFavoritesList(" . $id . ", $UserID)'>Add to Favorites</button></a>";
                    ?>
                </div>

                <!-- instructions segment start  -->
                <div>
                    <h2>INSTRUCTIONS:</h2>
                    <p> <?php echo "" . $instructions ?></p>
                </div>
                <!-- end instructions segment  -->

                </div>

                <!-- TODO WORK ON STYLING -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <script src="javascripts/favorites.js"></script>
</body>

</html>