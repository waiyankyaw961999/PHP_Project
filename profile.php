<?php
require_once("vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

Auth::check();
$db = new UsersTable(new MySQL());
if($_GET['id'])
{
    $user = $db->getOne($_GET['id']);
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container-fluid
        {
            justify-content: center;
            margin-top:10px;
            margin-left:20px;
        }
        .user_profile
        {
            text-align: center;
          
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="user_profile">
                <img class="" src="_actions/photos/<?= $user['photo']?>"</br>
                
            </div> 
            <a href="/_actions/edit.php?id=<?= $user['id'] ?>" class="fs-6 btn btn-sm btn-primary">Change your Profile</a>
            
        </div>        
        <div class="m-2 text-center">
        <?php
            echo "<p class='display-9'>Name: {$user['name']}</p>
                  <p class='display-11'>Email: {$user['email']}</p>
                  <p class='display-11'>Phone: {$user['phone']}</p>
                  <p class='display-11'>Address: {$user['address']}</p>             
                  <p class='display-11'>Role: {$user['role']}</p>
                  ";
            ?>
        </div>
   
    </div>
    
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>