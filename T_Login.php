<?php

include_once "Database.php";
$Database = new Database();

class T_Login {
    function checkLogin($username, $password){
        $Database = new Database();
        $sql = "SELECT * 
        FROM user 
        WHERE User_name LIKE '" . $username . "'
        AND password LIKE '" . $password . "'";
        $returnArray = $Database->selectAssc($sql);
        
        if(empty($returnArray)){
            return "false";
        }
        else{
            return "true";
        }
    }

    function createAccount($username, $password, $first, $last){
        $Database = new Database();
        $sql = "SELECT * 
        FROM user 
        WHERE User_name LIKE '" . $username . "'";
        $returnArray = $Database->selectAssc($sql);
        if(!empty($returnArray)){
            return "UserTaken";
        }
        $sql = "INSERT INTO `user` 
        ( `first_name`, `last_name`, `User_name`, `password`) 
        VALUES ('$first', '$last', '$username', '$password')";
        $Database->insert($sql);
        return ;
    }
}