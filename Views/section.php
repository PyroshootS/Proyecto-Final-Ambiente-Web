<?php 
    if (!isset($_SESSION['loggedIn'])){
        include 'login.php';
    } 
    else
    {
        include 'session.php';
    }
?>
