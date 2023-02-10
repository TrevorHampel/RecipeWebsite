<?php

include_once "DatabaseObjects/M_recipe.php";
include_once "DatabaseObjects/M_recipe_ingredient_link.php";
include_once "DatabaseObjects/M_ingredient.php";
include("includes/include.php"); 
//use DatabaseObjects\M_user;



// $recipesArray = getRecipeFromAPI(52830); // a random recipe as of 2022.10.22 - 6:04pm ref the include file

// $imgThumb = $recipesArray[0]['strMealThumb'];
// $id = $recipesArray[0]['idMeal'];
// $meal = $recipesArray[0]['strMeal'];
// $category = $recipesArray[0]['strCategory'];
// $area = $recipesArray[0]['strArea'];
// $instructions = $recipesArray[0]['strInstructions'];
// //$UserID = $_SESSION['UserID'];
// $ingredients = [];
// $video = $recipesArray[0]['strYoutube'];
// $source = $recipesArray[0]['strSource'];

// foreach ($recipesArray as $r) {

//     for ($i = 1; $i < 21; $i++) {
//         $strIng = 'strIngredient' . $i;
//         $strMeas = 'strMeasure' . $i;

//         if ($r[$strIng] == "") {
//             break;
//         }
//         $ingredients += [$r[$strIng] => $r[$strMeas]];
//     }
// }

// $userObj = new M_recipe();
// $userObj->recipe_name = $meal;
// $userObj-> = $meal;
// $userObj->recipe_name = $meal;
// $userObj->recipe_name = $meal;
// $userObj->recipe_name = $meal;

// // $userObj->first_name = "Trevor";
// // $userObj->last_name = "Hampel";
// // $userObj->user_name = "User";
// // $userObj->password = "Name";
// // $key = "M_user";
// // $tempObject = new $key(25);
// //echo var_dump($userObj->recipe_ingredient_link);
// // foreach($userObj->recipe_ingredient_link as $row)
// // {
// //     $row->ingredient_id->ingredient_value = "strawberry";
// //     $row->ingredient_id->update_obj();
// // }
// ob_start();
// var_dump($userObj); // output txt here
// error_log(ob_get_clean()."\n",3,'C:/xampp/htdocs/RecipeWebsite/output.txt');


// ob_start();
// var_dump($returnedArray); // output txt here
// error_log(ob_get_clean()."\n",3,'C:/xampp/htdocs/RecipeWebsite/output.txt');
    // if(isset($_POST['action'])){
    //     switch ($_POST['action']) {
    //         case "GetText":
    //             echo $_POST['textToReturn'];
    //             break;
    //         case "GetSecondThing":
    //             echo "Number:" . $_POST['number'] . " \nString:" .  $_POST['ThisIsJustAVar'] ;
    //             break;
    //     }
    //     // always be sure to exit(); or echo exit;
    //     exit();
    // }



    // echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
    // // echo '<script src="javascripts/ajaxScript.js"></script>';
    // // echo '<input type = "button" onclick = "ajaxTest()" value = "Display some text">';
    // // echo '<input type = "button" onclick = "ajaxTest2()" value = "Display a number">';
    // include("includes/include.php");
    // $categoryArray = array();
    // for($i = 0; $i <= 1000; $i++){
    //     $recipesArray = getRecipeFromAPI();
    //     $categoryArray[] = $recipesArray[0]["strCategory"];
    // }
    // $UcategoryArray = array();
    // foreach($categoryArray as $row){
    //     if(!in_array($row, $UcategoryArray)){
    //         $UcategoryArray[] = $row;
    //     }
    // }
    // echo var_dump($UcategoryArray);
    
    

    include_once "Database.php";
    $Database = new Database();

    $sql = "INSERT INTO `user`(`user_id`, `first_name`, `last_name`, `user_name`, `password`) VALUES (null,'a','a','a','a')";
    $Database->insert($sql);

    // // $sql = "UPDATE user set last_name = 'Something' WHERE user_id = 6";
    // // $Database->update($sql);

    // // $sql = "DELETE FROM user where user_id = 6";
    // // $Database->update($sql);


    // $sql = "SELECT * FROM user";
    // $resultArray = $Database->selectAssc($sql);
    // var_dump($resultArray);
?>