<?php
session_start();
include_once("includes/include.php");
?>

<!doctype html>
<html lang="en">

<head>
    <title>Search Categories</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/application.css">
</head>

<body>
    <?php include_once("includes/nav.php"); ?>

    <div class="card">
        <?php

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
        $categories = getCategories();

        foreach ($printVar as $cat) {
        }
        print_r($printVar);
        ?>
    </div>

</body>

</html>