<?php
include_once("includes/include.php");

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

    $returnArr = $categoryArr['meals'];

    return $returnArr;
}

function printRecipeGrid($catName)
{
    $UserId = $_SESSION['UserID'];
    $recipes = getRecipeByCategory($catName);
    $echoVar = "";
    $echoVar .= "<div class='card-body w-50'>";
    foreach ($recipes as $r) {
        $echoVar .= "<img class='card-img-top border rounded' src='" . $r['strMealThumb'] . "/preview' height='150px' width='150px'>";
        $echoVar .= "<h3 class='card-title'>" . $r['strMeal'] . "</h3>";
        $echoVar .= "<button type='button' class='btn btn-primary btn-md' onclick='addToFavoritesList(" . $r['idMeal'] . ", $UserId)'>Add to Favorites</button>";
    }
    $echoVar .= "</div>";
    echo $echoVar;
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Search Categories</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/application.css">
</head>

<body>
    <?php include_once("includes/nav.php"); ?>
    <h2>Search Categories</h2>
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
    <div class="d-flex align-items-center justify-content-center">
        <div class="card align-items-center justify-content-center m-3">
            <?php
            if (isset($_POST['search'])) {
                if (!empty($_POST['categories'])) {
                    printRecipeGrid($_POST['categories']);
                }
            }
            //printCategories();
            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="javascripts/favorites.js"></script>

</body>

</html>