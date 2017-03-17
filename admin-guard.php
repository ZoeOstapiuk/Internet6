<?php
    include('config.php');
    session_start();
    $login_session = $_SESSION['login_user'];
    
    if(!isset($login_session) && $_SESSION['isAdmin'] != 0) {
        header("Location: login.html");
    }
?>