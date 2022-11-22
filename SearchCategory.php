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

function printCategories()
{
    $categories = getCategories();
    $echoVar = "<div class='card'>";
    foreach ($categories as $cat) {
        $echoVar .= '<div class="card-body">';
        $echoVar .= '<h3 class="card-title">' . $cat['strCategory'] . '</h3>';
        $echoVar .= '<img class="card-img-left border rounded" src="' . $cat['strCategoryThumb'] . '">';
        $echoVar .= '</div>';
    }
    $echoVar .= '</div>';

    return $echoVar;
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

function showCatRecipes($catName)
{
    $url = "https://www.themealdb.com/api/json/v1/1/filter.php?c=" . $catName;
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
        <label for="categories">Choose a Category:</label>
        <select name="categories" id="categories">
            <?php
            printSelect();
            ?>
        </select>
        <?php

        //printCategories();
        ?>
    </div>

</body>

</html>