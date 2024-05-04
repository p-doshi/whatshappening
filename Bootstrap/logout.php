<?php

session_start();

// Check if the user is logged in
if(isset($_SESSION["login"]) && $_SESSION["login"] === TRUE){
    // If logged in, destroy the session
    session_destroy();

    // Redirect the user to the login page
    header("location: login.php");
    exit;
} else {
    // If the user is not logged in, redirect them to the login page
    header("location: login.php");
    exit;
}
?>
