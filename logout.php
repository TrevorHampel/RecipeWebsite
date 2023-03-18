<?php
    session_start();
    unset($_SESSION['UserID']);
    session_destroy();
    header("Location: Login.php");
?>