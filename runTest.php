<?php

// includes
include("tests.php");
include_once "T_Login.php";

//initializations
$tests = new tests();
$T_Login = new T_Login();



$print = "";
$print .= $tests->TestThisItem("true", $T_Login->checkLogin("Hampeltr@gmail.com", "TestPass"), "Check Login is correct ");
$print .= $tests->TestThisItem("false", $T_Login->checkLogin("Hampeltr@gmail.com", "TestPass1"), "Check Login if password is incorrect ");
$print .= $tests->TestThisItem("fals", $T_Login->checkLogin("DummyUsername", "DummyPassword"), "Check Login if both are wrong ");
$print .= $tests->echoTestResults();

echo "
<!doctype html>
<html lang=en>
    <body>
        $print
    </body>

</html>"
?>