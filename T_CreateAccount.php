<?php
include_once "T_Hash.php";
include_once "Database.php";
include_once "Session.php";
$Database = new Database();

class T_CreateAccount
{
    function createAccount($username, $password, $first, $last)
    {
        $Database = new Database();
        $T_Hash = new T_Hash();
        $newPass = $T_Hash->hashPass($password);
        $sql = "SELECT * 
        FROM user 
        WHERE user_name = '" . $username . "'";
        $returnArray = $Database->selectAssc($sql);
        if (!empty($returnArray)) {
            return "UserTaken";
        }
        $sql = "INSERT INTO `user` 
        ( `first_name`, `last_name`, `user_name`, `password`) 
        VALUES ('$first', '$last', '$username', '$newPass')";
        $Database->insert($sql);
        return;
    }
}
