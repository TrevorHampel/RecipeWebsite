<?php
    include("includes/include.php");
    include("Session.php");
?>
<!doctype html>
<html lang=en>
<head>
    <title>View Recipes</title>
    <link rel="stylesheet" href="stylesheets/application.css">
</head>
<body>
    <?php
        $recipesArray = getRecipeFromAPI(); // a random recipe as of 2022.10.22 - 6:04pm ref the include file
        
        $imgThumb = $recipesArray[0]['strMealThumb'];
        $id = $recipesArray[0]['idMeal'];
        $meal = $recipesArray[0]['strMeal'];
        $category = $recipesArray[0]['strCategory'];
        $area = $recipesArray[0]['strArea'];
        $instructions = $recipesArray[0]['strInstructions'];

        $ingredients = [];

        foreach ($recipesArray as $r){

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

    <div class="loginLogo row">
        <div class="col">
        <img src="images/WTF.png" alt="Big WTF Logo">
        </div>
    </div>
    
    <!-- surrond all -->
    <div> 
        <h1>RANDOM RECIPE</h1>

        <!-- img segment start  -->
        <div class="row"> 
            <div class="col"> 
                <h2>MEAL: <?php echo " ". $meal ?></h2>
            </div>
            <div class="col"> 
                <img style="height:200px; width:200px" src="<?php echo $imgThumb ?>">
            </div>
        </div>
        <!-- end img segment  -->

        <!-- ingredients segment start  -->
        <div> 
            <h2>INGREDIENTS:</h2>
            <?php
                $i = 1;
                foreach($ingredients as $ing){
                    echo "<p>" . 
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
            <p> <?php echo "" .$instructions ?></p>
        </div>
        <!-- end instructions segment  -->

    </div> 
    
    <!-- TODO WORK ON STYLING -->

</body>

</html>