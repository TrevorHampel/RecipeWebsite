<?php

    if(isset($_POST['action'])){
        switch ($_POST['action']) {
            case "GetText":
                echo $_POST['textToReturn'];
                break;
            case "GetSecondThing":
                echo "Number:" . $_POST['number'] . " String" .  $_POST['ThisIsJustAVar'] ;
                break;
        }
        exit();
    }



    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
    echo '<script src="javascripts/ajaxScript.js"></script>';
    echo '<input type = "button" onclick = "ajaxTest()" value = "Display some text">';
    echo '<input type = "button" onclick = "ajaxTest2()" value = "Display a number">';
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