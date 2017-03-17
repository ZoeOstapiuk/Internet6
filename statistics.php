<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js'></script>
        <script type='text/javascript' src='script.js'></script>
    </head>
    <body>
        <ul class="nav">
            <li><a href="login.html">Login</a></li>
            <li><a href="index.php">Tic tac toe</a></li>
            <li><a href="text-analyze.php">Text</a></li>
            <li class="pull-right"><a href="statistics.php" class="active">Stats</a></li>
            <li class="pull-right"><a href="logout.php">Logout</a></li>
            <li class="pull-right"><a href="register.html">Register</a></li>
        </ul>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">All users:</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Login</th>
                                <th>Password</th>
                                <th>Is admin</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "USERS";
                            $conn = mysqli_connect($servername, $username, $password, $dbname);

                            $myfile = fopen("database.txt", "w");

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql = "SELECT id, login, password, isAdmin FROM LOGGED_IN_USERS";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["id"] . 
                                    "</td><td>" . $row["login"]. 
                                    "</td><td>" . $row["password"]. 
                                    "</td><td>" . ($row["isAdmin"] == 1 ? "Admin" : "User") . "</td></tr>";
                                    $txt = $row["id"] . "|" . $row["login"] . "|" . $row["password"] . "|" .$row["isAdmin"] . PHP_EOL; 
                                    fwrite($myfile, $txt);
                                }
                            }
                            mysqli_close($conn);
                            fclose($myfile);
                        ?>
                        </tbody>
                        <a class="btn btn-primary pull-right" href="database.txt" download="database">Save data locally</a>
                    </table>
                    <form action="populate-db.php" method="POST" enctype= "multipart/form-data">
                        <input type="file" name="file">
                        <button type="submit" class="btn btn-default">Update database with file...</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
