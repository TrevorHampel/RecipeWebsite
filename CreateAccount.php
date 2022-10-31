<?php

include_once('includes/include.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Your Account</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div id="login-title">
        <h1>Create Your Account</h1>
    </div>

    <div id="login-form-container">
        <form action="" method="post">
            <p>Enter your First Name: </p>
            <input type="text" id="first_name_id" name="first-name" placeholder="First Name"></input>
            <p>Enter your Last Name: </p>
            <input type="text" id="last_name_id" name="last-name" placeholder="Last Name"></input>
            <p>Enter your username: </p>
            <input type="text"  id="username_id"name="username" placeholder="Username"></input>
            <p>Enter your password: </p>
            <input type="password" id="password_id" name="password" placeholder="Password"></input><br><br>
            <input type="button" onclick="CreateAccount()" name="submit-create-account" value="Create Account"></input>
        </form>
    </div>
    <div id="login-footer">

    </div>
</body>
<script src="javascripts/login.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</html>