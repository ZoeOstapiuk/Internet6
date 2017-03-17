<?php
    include('config.php');
    session_start();
    $login_session = $_SESSION['login_user'];
    
    if(!isset($login_session)) {
        header("Location: login.html");
    }
?>