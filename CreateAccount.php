<?php
include_once("TrevorScript.php");
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
            <input type="text" name="first-name" placeholder="First Name"></input>
            <p>Enter your Last Name: </p>
            <input type="text" name="last-name" placeholder="Last Name"></input>
            <p>Enter your username: </p>
            <input type="text" name="username" placeholder="Username"></input>
            <p>Enter your password: </p>
            <input type="password" name="password" placeholder="Password"></input><br><br>
            <input type="submit" name="submit-create-account" value="Create Account"></input>
        </form>
    </div>
    <?php
    var_dump($_POST);
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['first-name']) && isset($_POST['last-name'])) {
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['first-name']) && !empty($_POST['last-name'])) {
            echo '<br>' . isUsernameAvailable($_POST['username']);
        }
    }
    ?>
    <div id="login-footer">

    </div>
</body>

</html>