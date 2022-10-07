<?php
include_once("TrevorScript.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login to Your Account</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div id="login-title">
        <h1>Login to Your Account</h1>
    </div>

    <div id="login-form-container">
        <form action="" method="post">
            <p>Enter your username: </p>
            <input type="text" name="username" placeholder="Username"></input>
            <p>Enter your password: </p>
            <input type="password" name="password" placeholder="Password"></input><br><br>
            <input type="submit" name="submit-login" value="Log In"></input>
        </form>
    </div>
    <?php
    var_dump($_POST);
    if (isset($_POST['username']) && isset($_POST['password'])) {
    }
    ?>
    <div id="login-footer">

    </div>
</body>

</html>