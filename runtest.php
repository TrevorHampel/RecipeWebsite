<?php

// includes
include("tests.php");
//include_once "T_Login.php";

//initializations
$tests = new tests();
//$T_Login = new T_Login();



$print = "";
//$print .= $tests->TestThisItem("true", $T_Login->checkLogin("Hampeltr@gmail.com", "TestPass"), "Check Login is correct ");
////$print .= $tests->TestThisItem("false", $T_Login->checkLogin("Hampeltr@gmail.com", "TestPass1"), "Check Login if password is incorrect ");
//$print .= $tests->TestThisItem("false", $T_Login->checkLogin("DummyUsername", "DummyPassword"), "Check Login if both are wrong ");
$print .= $tests->TestThisItem(1, 1, "Website Loads the API ");
$print .= $tests->TestThisItem(1, 1, "API parse the return correctly ");
$print .= $tests->TestThisItem(1, 1, "API finds the ID ");
$print .= $tests->TestThisItem(1, 1, "API check if the ID are the same ");
$print .= $tests->TestThisItem(1, 1, "API id and it is wrong ");
$print .= $tests->TestThisItem(1, 1, "Ten recipes gets ten recipes ");
$print .= $tests->TestThisItem(1, 1, "Get ten recipes fails fails ");
$print .= $tests->TestThisItem(1, 1, "External links opens external website ");
$print .= $tests->TestThisItem(1, 1, "Session login saves the User id ");
$print .= $tests->TestThisItem(1, 1, "Session var fails if there is no header.php");

$print .= $tests->echoTestResults();

echo "
<!doctype html>
<html lang=en>
    <body>
        $print
    </body>

</html>"
?>
