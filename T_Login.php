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
        $returnArray = $Database->selectAssc(sql);

        if(returnArray === NULL){
            return false;
        }
        else{
            return true;
        }
        return ;
    }


}