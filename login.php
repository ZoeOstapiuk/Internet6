<?php
    include("config.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    { 
        $myusername = $_POST['name']; 
        $mypassword = $_POST['password']; 
        $sql="SELECT id FROM USERS WHERE login='$myusername' and password='$mypassword'";

        $result = mysqli_query($sql);
        if(mysqli_num_rows($result) == 0)
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['isAdmin'] = $row['isAdmin'];
            $_SESSION['login_user'] = $myusername;
            header("location: index.php");
        }
        else 
        {
            header("location: login.html");
        }
    }
?>
