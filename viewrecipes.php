<?php
    include("includes/include.php");
?>
<!doctype html>
<html lang=en>
<head>
<title>View Recipes</title>
<!-- <link src="\Bootstrap\css"> -->
</head>
<body>
    <?php
        $recipesArray = getRecipeFromAPI();
        
        $imgThumb = $recipesArray[0]['strMealThumb'];
        $id = $recipesArray[0]['idMeal'];
        $meal = $recipesArray[0]['strMeal'];
        $category = $recipesArray[0]['strCategory'];
        $area = $recipesArray[0]['strArea'];
        $instructions = $recipesArray[0]['strInstructions'];
        
        // get ingredients from random //
        $ing1 = $recipesArray[0]['strIngredient1'];
        $ing2 = $recipesArray[0]['strIngredient2'];
        $ing3 = $recipesArray[0]['strIngredient3'];
        $ing4 = $recipesArray[0]['strIngredient4'];

        // $allRecipes = parseRecipe($recipesArray);
    ?>
    <?php
        // WORKING - EXPERIEMNTS - ETC //
        // $recipesArray = parseRecipe(getRecipeFromAPI());
        // $mealID = $recipesArray[0][''];
        // print_r($recipesArray);
        // var_dump($recipesArray);
        // echo "THIS IS THE ID FOR THE MEAL " . $recipesArray[0]["idMeal"];
        // echo $recipesArray->[]->idMeal;
        // echo $recipesArray[0]['idMeal'];
    ?>

    <h1>RANDOM RECIPE</h1>
    <h2>MEAL: <?php echo " ". $meal ?></h2>
    <img style="height:200px; width:200px" src="<?php echo $imgThumb ?>">
    <h2>INGREDIENTS:</h2>
    <p> <?php echo "" .$ing1 ?></p>
    <p> <?php echo "" .$ing2 ?></p>
    <p> <?php echo "" .$ing3 ?></p>
    <p> <?php echo "" .$ing4 ?></p>
    <h2>INSTRUCTIONS:</h2>
    <p> <?php echo "" .$instructions ?></p>

    <!-- TODO WORK ON STYLING -->

</body>

</html>