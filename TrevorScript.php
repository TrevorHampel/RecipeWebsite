<?php

include_once "DatabaseObjects/M_user.php";
//use DatabaseObjects\M_user;


$userObj = new M_user(23);
// $userObj->first_name = "Trevor";
// $userObj->last_name = "Hampel";
// $userObj->user_name = "User";
// $userObj->password = "Name";


ob_start();
var_dump($userObj); // output txt here
error_log(ob_get_clean()."\n",3,'C:/xampp/htdocs/RecipeWebsite/output.txt');


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
    
    

    // include_once "Database.php";
    // $Database = new Database();

    // // $sql = "INSERT INTO `user`(`first_name`, `last_name`) VALUES ('TEST','USER2')";
    // // $Database->insert($sql);

    // // $sql = "UPDATE user set last_name = 'Something' WHERE user_id = 6";
    // // $Database->update($sql);

    // // $sql = "DELETE FROM user where user_id = 6";
    // // $Database->update($sql);


    // $sql = "SELECT * FROM user";
    // $resultArray = $Database->selectAssc($sql);
    // var_dump($resultArray);
?>