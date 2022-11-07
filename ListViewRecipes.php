<?php include("includes/include.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <title>10 Random Recipes</title>
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php include_once("includes/nav.php"); ?>
    <h1 class="h1 text-center">10 Random Recipes</h1>
    <div class="d-flex align-items-center justify-content-center">
        <?php
        //var_dump($_SESSION);
        $recipe_array = parseRecipe(getRecipeFromAPI(0));
        //print_r($recipe_array);
        $print_var = '<div class="card w-50 m-5 p-5 border rounded">';
        foreach ($recipe_array as $recipe) {
            //print_r($recipe);
            $print_var .= '<img class="card-img-top border rounded" src="' . $recipe->getThumbnail() . '" alt="' . $recipe->getName() . '">';
            $print_var .= '<div class="card-body">';
            $print_var .= '<h3 class="card-title">' . $recipe->getName() . '</h3>';
            $print_var .= '<p class="card-text">' . $recipe->getCategory() . '</p>';
            $print_var .= '<button type="button" class="btn btn-primary btn-md m-3">Add to Favorites</button>'; //still need to implement favorites
            $print_var .= '<a class="m-3" href="' . $recipe->getRecipeVideo() . '"><button type="button" class="btn btn-secondary btn-md">Recipe Video</button></a>';
            $print_var .= '<a class="m-3" href="' . $recipe->getRecipeSource() . '"><button type="button" class="btn btn-primary btn-md">Recipe Source</button></a>';
            $print_var .= '</div>';
        }
        $print_var .= '</div>';
        echo $print_var;
        ?>
    </div>



</body>

</html>