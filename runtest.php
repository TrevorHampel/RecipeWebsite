<?php

// includes
include("tests.php");
include_once "T_Login.php";

//initializations
$tests = new tests();
$T_Login = new T_Login();



$print = "";
$print .= $tests->TestThisItem("true", $T_Login->checkLogin("scarjo", "Widow"), "Check Login is correct ");
$print .= $tests->TestThisItem("false", $T_Login->checkLogin("scarjo", "Widow1"), "Check Login if password is incorrect ");
$print .= $tests->TestThisItem("false", $T_Login->checkLogin("DummyUsername", "DummyPassword"), "Check Login if both are wrong ");
$print .= $tests->TestM_recipe();

$print .= $tests->echoTestResults();


echo "
<!doctype html>
<html lang=en>
    <body>
        $print
    </body>
    

</html>"
?>
