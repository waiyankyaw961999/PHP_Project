<?php
session_start();
require_once("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$auth = Auth::check();

if($_GET['id'])
{
    $db = new UsersTable(new MySQL());
    $user = $db->getOne($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Register</title>
</head>
<body>
<div class="container m-3">
    <h2 class="text-center text-primary">Register</h2>
    <br>
    <div class="form-group container m-2">
   
    <form action="edit_profile.php?id=<?= $user['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group p-2 text-center">
            <img class="blank_profile" src="photos/<?= $user['photo']? $user['photo']: "blank_profile.webp" ?>">     
        </div>
        <br>
        
        <div class="input-group mb-3 photo_upload">
                <div>
                <input type="file" name="photo" class="form-control form-control-sm">
                </div>
        </div>

        <div class="form-group row p-3">
            <label for="name" class="col-sm-2 col-md-3 col-form-label text-center" >Name</label>
            <div class="col-sm-10 col-md-6">

                <input type="name" class="form-control" name="name" placeholder="<?= $user['name'] ?>">    
                <?php if(in_array('name',$error)):?>
                <small class="alert alert-warning">Enter Name.</small>                    
                <?php endif ?>

            </div>
        </div>        

        <div class="form-group row p-3">
            <label for="staticEmail" class="col-sm-2 col-md-3 col-form-label text-center">Email</label>
            <div class="col-sm-10 col-md-6">            
                <input type="text" class="form-control" name="email" placeholder="<?= $user['email'] ?>">
                <?php if(in_array('email',$error)):?>
                <small class="alert alert-warning">Enter Email.</small>                    
                <?php endif ?>
            </div>
        </div>

        <div class="form-group row p-3">
            <label for="phone" class="col-sm-2 col-md-3 col-form-label text-center">Phone</label>
            <div class="col-sm-10 col-md-6">            

                <input type="tel" class="form-control" name="phone" placeholder="<?= $user['phone'] ?>">
                <?php if(in_array('phone',$error)):?>
                <small class="alert alert-warning">Enter Phone.</small>                    
                <?php endif ?>
            </div>
        </div>

        <div class="form-group row p-3">
            <label for="inputPassword" class="col-sm-2 col-md-3 col-form-label text-center">Password</label>
            <div class="col-sm-10 col-md-6">

            
                <input type="password" class="form-control" name="password" placeholder="Password">
                <?php if(in_array('password',$error)):?>
                <small class="alert alert-warning">Enter Password.</small>                    
                <?php endif ?>
            </div>            
        </div>

        <div class="form-group row p-3">
            <label for="address" class="col-sm-2 col-md-3 col-form-label text-center">City</label>
                <div class="col-sm-10 col-md-6">
                
                    <input type="text" name="city" class="form-control" placeholder="<?= $user['address'] ?>">
                    <?php if(in_array('city',$error)):?>
                <small class="alert alert-warning">Enter City.</small>                    
                <?php endif ?>
                </div>
                <br>                               
        </div>
        <div class="form-group row p-3">
                    <label class="col-sm-2 col-md-3 col-form-label text-center"></label>
                    <div class="col-sm-4 col-md-3 m-2">                    
                        <input type="text" name="state" class="form-control" placeholder="State">
                        <?php if(in_array('state',$error)):?>
                
                <small class="alert alert-warning">Enter State.</small>                    
                <?php endif ?>
                    </div>
                    <div class="col-sm-4 col-md-3 m-2">
                    
                        <input type="text" name="zip" class="form-control" placeholder="Zip">
                        <?php if(in_array('zip',$error)):?>
                <small class="alert alert-warning">Enter Zip.</small>                    
                <?php endif ?>
                    </div>
        </div> 
        
        <div class="submit">
            <a href="admin.php" class="btn btn-success m-2">Back</a>
            <button type="submit" class="btn btn-success m-2">Confirm</button>
        </div>

    </form>
    </div>
    </div>
</body>
</html>