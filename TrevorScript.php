<?php


    echo "something";

    include_once "Database.php";
    $Database = new Database();

    // $sql = "INSERT INTO `user`(`first_name`, `last_name`) VALUES ('TEST','USER2')";
    // $Database->insert($sql);

    // $sql = "UPDATE user set last_name = 'Something' WHERE user_id = 6";
    // $Database->update($sql);

    $sql = "DELETE FROM user where user_id = 6";
    $Database->update($sql);


    $sql = "SELECT * FROM user";
    $resultArray = $Database->selectAssc($sql);
    var_dump($resultArray);
