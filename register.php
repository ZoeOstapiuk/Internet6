<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "USERS";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $login = $_POST["name"];
    $pass = $_POST["password"];
    $sql = "INSERT INTO LOGGED_IN_USERS (login, password, isAdmin)
    VALUES ('{$login}', '{$pass}', 0)";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("location: login.html");
?>