<?php
include("includes/include.php");
?>
<!doctype html>
<html lang=en>

<head>
    <title>View Recipes</title>
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">

</head>

<body>
    <?php
    var_dump($_SESSION);
    var_dump($_POST);
    include_once("includes/nav.php");
    $recipesArray = getRecipeFromAPI(-1); // a random recipe as of 2022.10.22 - 6:04pm ref the include file

    $imgThumb = $recipesArray[0]['strMealThumb'];
    $id = $recipesArray[0]['idMeal'];
    $meal = $recipesArray[0]['strMeal'];
    $category = $recipesArray[0]['strCategory'];
    $area = $recipesArray[0]['strArea'];
    $instructions = $recipesArray[0]['strInstructions'];

    $ingredients = [];

    foreach ($recipesArray as $r) {

        for ($i = 1; $i < 21; $i++) {
            $strIng = 'strIngredient' . $i;
            $strMeas = 'strMeasure' . $i;

            if ($r[$strIng] == "") {
                break;
            }
            $ingredients += [$r[$strIng] => $r[$strMeas]];
        }
    }
    // var_dump($ingredients);
    // $allRecipes = parseRecipe($recipesArray);
    //echo var_dump($_SESSION);
    ?>

    <!-- surrond all -->
    <div class="container">
        <div class="card bg-light text-center">
            <h1>RANDOM RECIPE</h1>

            <!-- img segment start  -->
            <div class="card-header">
                <h2 class="card-title">MEAL: <?php echo " " . $meal ?></h2>
                <img class="card-img-top" style="height:200px; width:200px" src="<?php echo $imgThumb ?>">
            </div>
            <!-- end img segment  -->

            <!-- ingredients segment start  -->
            <div class="card-body">
                <h2>INGREDIENTS:</h2>
                <?php
                $i = 1;
                foreach ($ingredients as $ing) {
                    echo "<p class=>" .
                        $recipesArray[0]["strIngredient$i"] . " : " .
                        $recipesArray[0]["strMeasure$i"] .
                        "</p>";
                    $i++;
                }
                ?>
            </div>
            <!-- end ingredients segment  -->

            <!-- instructions segment start  -->
            <div>
                <h2>INSTRUCTIONS:</h2>
                <p> <?php echo "" . $instructions ?></p>
            </div>
            <!-- end instructions segment  -->
        </div>
    </div>

    <!-- TODO WORK ON STYLING -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>