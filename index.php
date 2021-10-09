<?php
session_start();
require_once("vendor/autoload.php");

use Helpers\showMessage;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container m-3">
    <h2 class="text-center text-primary">Welcome to User Management System</h2>
    <br>

    <?php
        showMessage::session_message();    
    ?>
    <div class="form-group container m-2">
    <form action="_actions/login.php" method="POST">
        <div class="form-group row p-3">
    <label for="staticEmail" class="col-sm-2 col-md-3 col-form-label text-center">Email</label>
        <div class="col-sm-10 col-md-6">
            <input type="email" class="form-control" name="email" placeholder="email@example.com">
        </div>
    </div>
    <div class="form-group row p-3">
        <label for="inputPassword" class="col-sm-2 col-md-3 col-form-label text-center">Password</label>
        <div class="col-sm-10 col-md-6">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
    </div>
    <div class="submit">
        <button type="submit" class="btn btn-success m-2">Sign In</button>
        <a href="register.php" class="btn btn-success m-2">To Register</a>
    </div>
    </form>
    </div>
    </div>
    
    
</body>
</html>