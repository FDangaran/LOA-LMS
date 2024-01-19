<?php
    session_start();
    // Check if the user is not logged in
    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
        header("location: login.php");
        exit;
    }
?>