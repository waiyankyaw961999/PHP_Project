<?php
session_start();
require_once("vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$auth = Auth::check();

$user_session = $_SESSION['user'];

$db = new UsersTable(new MySQL());
$users_data = $db->getAll();

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
    <h2 class="text-center text-primary">Welcome <?php echo $user_session['name'] ?></h2>
    <br>  

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Role</th>
          <?php if($auth['value']>1)
          {
            echo "<th scope='col'>Actions</th>";
          }
        else
          {

          }
          ?>
          
        </tr>
      </thead>
      <tbody>
          <?php foreach($users_data as $user):?>
            <tr class="<?= $user['id']== $user_session['id']? 'table-info':''?>" >
            <th scope="row"><?= $user['id'] ?></th>
            <td><a href="profile.php?id=<?= $user['id']?>"><?= $user['name'] ?></a></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['phone'] ?></td>
            <td><?php if($user['value']==="1"): ?>
                    <span class="badge bg-secondary">
                        <?= $user['role']?>
                    </span>
                <?php elseif($user['value']==="2"):?>
                    <span class="badge bg-primary">
                        <?= $user['role']?>
                    </span>
                <?php else:?>
                    <span class="badge bg-success">
                        <?= $user['role']?>
                    </span>
                    <?php endif ?>      
            </td> 
            <td>
              <?php
              ?>
                <?php if($auth['value'] > 1):?>
                
                    <div class="btn-group dropdown">
                        <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle m-1" data-bs-toggle="dropdown">Change Role</a>
                    
                    <div class="dropdown-menu dropdown-menu-dark">
                        <a href="_actions/role.php?id=<?= $user['id']?>&role=1" class="dropdown-item">User</a>
                        <a href="_actions/role.php?id=<?=$user['id']?>&role=2" class="dropdown-item">Manager</a>
                        <a href="_actions/role.php?id=<?=$user['id']?>&role=3" class="dropdown-item">Admin</a>
                    </div>

                    <div class="btn-group dropdown">
                        <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle m-1" data-bs-toggle="dropdown">Status</a>
                    
                    <div class="dropdown-menu dropdown-menu-dark">
                      <?php if($user['suspended']==0):?>
                        <a href="_actions/suspend.php?id=<?= $user['id']?>" class="btn btn-sm btn-danger m-1">Suspend</a>
                      <?php else: ?>
                        <a href="_actions/unsuspend.php?id=<?= $user['id']?>" class="btn btn-sm btn-danger m-1">Unsuspend</a>
                      <?php endif ?>
                        <a href="_actions/suspend.php?id=<?= $user['id']?>" class="btn btn-sm btn-outline-danger m-1" onClick="return confirm(Are you Sure?)">Delete</a>
                    </div>                     
                        
                      
                      </div>
            <?php else:?>
            <?php endif ?>
            </td>
            <td>
            <?php if($user['id']== $user_session['id'])
            {
              echo "<a href='_actions/logout.php' class='bg-warning btn btn-sm btn-outline-warning m-1 logout'>Logout</a>";
            }            
            ?>
             </td>
            </tr>
            <?php endforeach ?>
      </tbody>
    </table>
  
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    
</body>
</html>