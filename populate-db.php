<?php
    include("config.php");
    $uploadfile = basename($_FILES['file']['name']);

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        echo "Something went wrong!";
    } 

    $file = fopen($uploadfile, "r");
    while(!feof($file)) {
        $line = fgets($file);
        $array = explode("|", $line);
        $login = @$array[1];
        $pass = @$array[2];
        $isAdmin = intval(@$array[3]);
        $sql = "INSERT INTO LOGGED_IN_USERS (login, password, isAdmin)
        VALUES ('{$login}', '{$pass}', {$isAdmin})";

        if (!mysqli_query($conn, $sql)) {
            echo mysqli_error($conn);
        }
    }
    fclose($file);
    mysqli_close($conn);
    header("location: statistics.php")
?>