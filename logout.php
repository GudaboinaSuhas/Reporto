<?php

    session_start();
    session_destroy();
    unset($_SESSION['username']);
    die("You're now logged out");
    header("location:login.php");

?>

