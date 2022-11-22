<?php include("includes/include.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <title>10 Random Recipes</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/application.css">
</head>

<body>
    <?php include_once("includes/nav.php"); ?>

    <div class="loginLogo row">
        <div class="col">
            <img src="images/WTFcropped.png" alt="Big WTF Logo">
        </div>
    </div>

    <!-- Single example card used for testing without the php
    <h1 class="h1 text-center">10 Random Recipes</h1>
    <div class="d-flex align-items-center justify-content-center">
        <div class="card w-50 m-5 p-2 border rounded list">
            <div class="row center">
                <a href="!!!TODO route to viewrecipies.php page using this recepie!!!">
                    <h2 class="card-title">Clam chowder</h2>
                    <p class="card-text">Recepie type: Starter</p>
                    <img class="card-img-top border rounded" src="https://www.themealdb.com/images/media/meals/rvtvuw1511190488.jpg" alt="clamChowderImg">
                </a>
                <a>
                    <button type="button" class="btn btn-primary btn-md m-3">Add to Favorites</button></a>
                <a href="' . $recipe->getRecipeVideo() . '">
                    <button type="button" class="btn btn-danger btn-md m-3">Recipe Video</button></a>
                <a href="' . $recipe->getRecipeSource() . '">
                    <button type="button" class="btn btn-primary btn-md m-3">Original Recepie</button></a>
            </div>
        </div>
    </div>
    -->

    <div class="d-flex align-items-center justify-content-center">
        <?php
        //var_dump($_SESSION);
        $recipe_array = parseRecipe(getRecipeFromAPI(0));
        //print_r($recipe_array);
        $print_var = '<div class="card w-50 m-5 p-2 border rounded list">';
        foreach ($recipe_array as $recipe) {
            //print_r($recipe);
            $print_var .= '<div class="row center">';
                $print_var .= '<a href="!!!TODO route to viewrecipies.php page using this recepie!!!">';
                    $print_var .= '<h3 class="card-title">' . $recipe->getName() . '</h3>';
                    $print_var .= '<p class="card-text">Recepie type: ' . $recipe->getCategory() . '</p>';

                    $print_var .= '<img class="card-img-top border rounded" src="' . $recipe->getThumbnail() . '" alt="' . $recipe->getName() . '"></a>';

                $print_var .= '<a><button type="button" class="btn btn-primary btn-md m-3">Add to Favorites</button></a>'; //still need to implement favorites
                $print_var .= '<a href="' . $recipe->getRecipeVideo() . '"><button type="button" class="btn btn-danger btn-md m-3">Recipe Video</button></a>';
                $print_var .= '<a href="' . $recipe->getRecipeSource() . '"><button type="button" class="btn btn-primary btn-md m-3">Recipe Source</button></a>';
            $print_var .= '</div>';

            $print_var .= '<hr class="row bar">';
        }

        // Remove last <hr>
        $print_var = substr($print_var, 0, -20);

        $print_var .= '</div>';
        echo $print_var;
        ?>
    </div>

</body>

</html>