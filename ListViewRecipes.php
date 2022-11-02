<?php include("includes/include.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <title>10 Random Recipes</title>
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php include_once("includes/nav.php"); ?>
    <div class="container">
        <?php
        var_dump($_SESSION);
        $recipe_array[] = new Recipe();
        $recipe_array = parseRecipe(getRecipeFromAPI(0));
        //print_r($recipe_array);
        $print_var = '<div class="card w-75 m-5 p-5">';
        foreach ($recipe_array as $recipe) {
            //print_r($recipe);
            $print_var .= '<img class="card-img-top" src="' . $recipe->getThumbnail() . '" alt="' . $recipe->getName() . '">';
            $print_var .= '<div class="card-body">';
            $print_var .= '<h3 class="card-title">' . $recipe->getName() . '</h3>';
            $print_var .= '<p class="card-text">' . $recipe->getCategory() . '</p>';

            $print_var .= '</div>';
        }
        $print_var .= '</div>';
        echo $print_var;
        ?>
    </div>



</body>

</html>