<?php 
include("includes/include.php"); 
// redirect the user to the login page if there user id is not in session
if(!isset($_SESSION["UserID"])){
    header("Location: Login.php");
}


function getCategories()
{
    $key = auth;
    $categoryAPI = "https://www.themealdb.com/api/json/v2/" . $key . "/categories.php";
    $categoryArr = [];

    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $categoryAPI);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

    $categoryJSON = curl_exec($curl_handle);

    curl_close($curl_handle);

    $categoryArr = json_decode($categoryJSON, true);

    $returnArr = $categoryArr['categories'];

    return $returnArr;
}


function printSelect()
{
    $listVar = "";
    $categories = getCategories();
    foreach ($categories as $cat) {
        $listVar .= "<option value='" . $cat['strCategory'] . "'>" . $cat['strCategory'] . "</option>";
    }

    echo $listVar;
}

function getRecipeByCategory($catName)
{
    $url = "https://www.themealdb.com/api/json/v2/" . auth . "/filter.php?c=" . $catName;

    $curl_handle = curl_init();

    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

    $categoryJSON = curl_exec($curl_handle);

    curl_close($curl_handle);

    $categoryArr = json_decode($categoryJSON, true);

    return $categoryArr['meals'];
}

function convertRecipeByCategory($recipes)
{
    $recipe_array = [];
    $limit = 0;
    foreach ($recipes as $r) {
        if ($limit > 9) break;
        $limit++;
        $temp_arr = getRecipeFromAPI($r['idMeal']);
        $temp = $temp_arr[0];
        array_push($recipe_array, $temp);
    }

    return $recipe_array;
}

function printRecipeGrid($catName)
{

    $UserId = $_SESSION['UserID'];
    $recipes = getRecipeByCategory($catName);
    $print_var = "";
    $print_var .= '<div class="card w-50 m-5 p-2 border rounded list">';
    foreach ($recipes as $r) {
        $print_var .= '<div class="row center">';
        $print_var .= '<a href="!!!TODO route to viewrecipies.php page using this recepie!!!">';
        $print_var .= '<h3 class="card-title">' . $r['strMeal'] . '</h3>';

        $print_var .= '<img class="card-img-top border rounded img-fluid" src="' . $r['strMealThumb'] . '" alt="' . $r['strMeal'] . '"></a>';
        $print_var .= '</div>';

        $print_var .= '<div class="row center">';
        $print_var .= "<a><button type='button' class='btn btn-primary btn-md m-3' onclick='addToFavoritesList(" . $r['idMeal'] . ", $UserId)'>Add to Favorites</button></a>";
        $print_var .= '</div>';

        $print_var .= '<hr class="row bar">';
    }

    // Remove last <hr>
    $print_var = substr($print_var, 0, -20);

    $print_var .= "</div>";
    echo $print_var;
}

function printRecipeGrid2($catName)
{
    $UserId = $_SESSION['UserID'];
    $recipe_array_cat = getRecipeByCategory($catName);
    $recipe_array = parseRecipe(convertRecipeByCategory($recipe_array_cat));
    # $limit = 0;

    $print_var = '<div class="card w-50 m-5 p-2 border rounded list">';
    foreach ($recipe_array as $recipe) {
        //print_r($recipe);
        #if ($limit > 9) break;
        #$limit++;
        $print_var .= '<div class="row center">';
        $print_var .= '<a href="!!!TODO route to viewrecipies.php page using this recepie!!!">';
        $print_var .= '<h3 class="card-title">' . $recipe->getName() . '</h3>';

        $print_var .= '<img class="card-img-top border rounded" src="' . $recipe->getThumbnail() . '" alt="' . $recipe->getName() . '"></a>';
        $print_var .= '</div>';

        $print_var .= '<div class="row center">';
        $print_var .= "<a><button type='button' class='btn btn-primary btn-md m-3' onclick='addToFavoritesList(" . $recipe->getId() . ", $UserId)'>Add to Favorites</button></a>";
        $print_var .= '<a href="' . $recipe->getRecipeVideo() . '"><button type="button" class="btn btn-danger btn-md m-3">Recipe Video</button></a>';
        $print_var .= '<a href="' . $recipe->getRecipeSource() . '"><button type="button" class="btn btn-primary btn-md m-3">Recipe Source</button></a>';
        $print_var .= '</div>';

        $print_var .= '<hr class="row bar">';
    }

    // Remove last <hr>
    $print_var = substr($print_var, 0, -20);

    $print_var .= '</div>';
    echo $print_var;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Search Categories</title>
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

    <h1 class="centerText">Search Categories</h1>

    <div class="d-flex align-items-center justify-content-center">

        <form method="post" action="">
            <label for="categories">Choose a Category:</label>
            <select name="categories" id="categories">
                <option value="" disable selected>Choose a Category</option>
                <?php
                printSelect();
                ?>
            </select>
            <input type="submit" name="search" value="Search">
        </form>
    </div>

    <?php
    if (isset($_POST['search'])) {
        if (!empty($_POST['categories'])) {
            $print_var = '<h1 class="h1 text-center space">';
            $print_var .= $_POST['categories'];
            $print_var .= '</h1>';
            echo $print_var;
        }
    }
    ?>

    <div class="d-flex align-items-center justify-content-center">
        <?php
        if (isset($_POST['search'])) {
            if (!empty($_POST['categories'])) {
                printRecipeGrid($_POST['categories']);
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