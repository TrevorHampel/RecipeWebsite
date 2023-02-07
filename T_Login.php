<?php
include_once "T_Hash.php";
include_once "Database.php";
include_once "Session.php";
$Database = new Database();

class T_Login
{
    function checkLogin($username, $password)
    {
        $Database = new Database();

        $sql = "SELECT * 
        FROM user 
        WHERE user_name LIKE '" . $username . "'
        AND password LIKE '" . $password . "'";
        $returnArray = $Database->selectAssc($sql);

        if (empty($returnArray)) {
            return "false";
        } else {
            //Start the session var
            $this->setSessionUserID($returnArray[0]["user_id"]);
            return "true";
        }
    }

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
        //Start the session var
        $this->setSessionUserID($returnArray[0]["user_id"]);
        $sql = "INSERT INTO `user` 
        ( `first_name`, `last_name`, `user_name`, `password`) 
        VALUES ('$first', '$last', '$username', '$newPass')";
        $Database->insert($sql);
        return;
    }

    function setSessionUserID($UserID)
    {
        $_SESSION["UserID"] = $UserID;
    }
    
}
