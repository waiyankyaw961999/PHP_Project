<?php
session_start();
require_once "vendor/autoload.php";
use Helpers\showMessage;

$error = $_SESSION['message'];
print_r($error);

if(array_search('name',$error))
{
    echo "true";
};



?>
<?php if(array_search('name',$error)):?>
    <div class="alert alert-warning">Enter Name.</div>                    
<?php endif ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>
<div class="container m-3">
    <h2 class="text-center text-primary">Register</h2>
    <br>

    <div class="form-group container m-2">
   
    <form action="_actions/create.php" method="POST" enctype="multipart/form-data">

        <div class="form-group p-2 text-center">
            <img class="blank_profile" src="img/blank_profile.webp">     
        </div>
        <br>
        
        <div class="input-group mb-3 photo_upload">
                <div>
                <input type="file" name="photo" class="form-control form-control-sm">
                </div>
        </div>

        <div class="form-group row p-3">
            <label for="name" class="col-sm-2 col-md-3 col-form-label text-center">Name</label>
            <div class="col-sm-10 col-md-6">
                
                <input type="name" class="form-control" name="name" placeholder="Enter Name">                
            </div>
        </div>        

        <div class="form-group row p-3">
            <label for="staticEmail" class="col-sm-2 col-md-3 col-form-label text-center">Email</label>
            <div class="col-sm-10 col-md-6">

            <?php if(array_search('email',$error)):?>
                <div class="alert alert-warning">Enter Email.</div>                    
                <?php endif ?>

                <input type="text" class="form-control" name="email" placeholder="email@example.com">
            </div>
        </div>

        <div class="form-group row p-3">
            <label for="phone" class="col-sm-2 col-md-3 col-form-label text-center">Phone</label>
            <div class="col-sm-10 col-md-6">

            <?php if(array_search('phone',$error)):?>
                <div class="alert alert-warning">Enter Phone.</div>                    
                <?php endif ?>

                <input type="tel" class="form-control" name="phone" placeholder="Phone Number">
            </div>
        </div>

        <div class="form-group row p-3">
            <label for="inputPassword" class="col-sm-2 col-md-3 col-form-label text-center">Password</label>
            <div class="col-sm-10 col-md-6">

            <?php if(array_search('password',$error)):?>
                <div class="alert alert-warning">Enter Password.</div>                    
                <?php endif ?>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>            
        </div>

        <div class="form-group row p-3">
            <label for="address" class="col-sm-2 col-md-3 col-form-label text-center">City</label>
                <div class="col-sm-10 col-md-6">
                <?php if(array_search('city',$error)):?>
                <div class="alert alert-warning">Enter City.</div>                    
                <?php endif ?>
                    <input type="text" name="address" class="form-control" placeholder="City">
                </div>
                <br>                               
        </div>
        <div class="form-group row p-3">
                    <label class="col-sm-2 col-md-3 col-form-label text-center"></label>
                    <div class="col-sm-4 col-md-3 m-2">

                    <?php if(array_search('state',$error)):?>
                <div class="alert alert-warning">Enter State.</div>                    
                <?php endif ?>
                        <input type="text" name="state" class="form-control" placeholder="State">
                    </div>
                    <div class="col-sm-4 col-md-3 m-2">
                    <?php if(array_search('zip',$error)):?>
                <div class="alert alert-warning">Enter City.</div>                    
                <?php endif ?>
                        <input type="text" name="zip" class="form-control" placeholder="Zip">
                    </div>
        </div> 
        

        <div class="submit">
            <a href="index.php" class="btn btn-success m-2">Back</a>
            <button type="submit" class="btn btn-success m-2">Register</button>
        </div>

    </form>
    </div>
    </div>
</body>
</html>