<?php
include("includes/include.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Testing Mark's php file</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div id="title-card">
        <h1>Practicing with PHP again</h1>
        <h2><a href="Login.php">Login</a></h2>
        <h2><a href="CreateAccount.php">Create Account</a></h2>
    </div>
    <div id="recipe-card">
        <?php
        //hellowWorld();
        parseJSON('includes/random2.json');
        ?>
    </div>
</body>

</html>