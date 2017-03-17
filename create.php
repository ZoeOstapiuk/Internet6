<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "USERS";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS " . $dbName;
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully! ";
        $conn = mysqli_connect($servername, $username, $password, $dbName);
        $sql = "CREATE TABLE IF NOT EXISTS LOGGED_IN_USERS (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            login VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            isAdmin tinyint(1) NOT NULL
            )";
        if (mysqli_query($conn, $sql)) {
            echo "Table is successfully created!";
        } else {
        echo "Error creating table: " . mysqli_error($conn);
        }
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>