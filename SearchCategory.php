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
?>

<!doctype html>
<html lang="en">

<head>
    <title>Search Categories</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/application.css">
</head>

<body>
    <?php include_once("includes/nav.php"); ?>

    <div class="d-flex align-items-center justify-content-center">
        <?php
        $categories = getCategories();
        $echoVar = "<div class='card'>";
        foreach ($categories as $cat) {
            $echoVar .= '<div class="card-body">';
            $echoVar .= '<h3 class="card-title">' . $cat['strCategory'] . '</h3>';
            $echoVar .= '<img class="card-img-left border rounded" src="' . $cat['strCategoryThumb'] . '">';
            $echoVar .= '</div>';
        }
        $echoVar .= '</div>';

        echo $echoVar;
        ?>
    </div>

</body>

</html>