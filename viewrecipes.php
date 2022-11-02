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
    <div class="recipe"> 
        <h1 class="centerText">RANDOM RECIPE</h1>

        <!-- img segment start  -->
        <div class="row noedge"> 
            <h2 class="centerText">MEAL: <?php echo " ". $meal ?></h2>
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
                    foreach($ingredients as $ing){
                        echo '<div class="row checkbox">';
                            echo '<div class="col-1">';
                                echo '<input type="checkbox"
                                name="'. $recipesArray[0]["strIngredient$i"] .'" 
                                value="'. $recipesArray[0]["strIngredient$i"] .'">';
                            echo '</div>';
                            echo '<div class="col-11">';
                                echo "<p>" . 
                                $recipesArray[0]["strIngredient$i"] . " : " . 
                                $recipesArray[0]["strMeasure$i"] .  
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