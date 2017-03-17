<?php 
    include("guard.php"); 
?>
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
            <li><a href="text-analyze.php" class="active">Text</a></li>
            <li class="pull-right"><a href="statistics.php">Stats</a></li>
            <li class="pull-right"><a href="logout.php">Logout</a></li>
            <li class="pull-right"><a href="register.html">Register</a></li>
        </ul>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Enter your text!</div>
                <div class="panel-body">
                    <textarea id="text"></textarea>
                    <button id="submit" class="btn btn-primary">Analyze</button>
                </div>
                <div class="panel-footer" id="result"></div>
            </div>
        </div>
    </body>
</html>
