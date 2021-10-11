<?php
require_once("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

Auth::check();

if($_GET['id'])
{
    $db = new UsersTable(new MySQL());
    $user = $db->getOne($_GET['id']);
  
    if($_GET['id'] !== $_SESSION['user']['id'])
    {
        if($user['roles_id'] == 3)
        {
            HTTP::redirect('../admin.php','You cannot delete other admin account');
            
        }
        else
        {
            $db->delete($_GET['id']);
            HTTP::redirect('../admin.php','Success Delete');
        }
        
       
    }
    else
    {
        if($_GET['id'] == $_SESSION['user']['id'])
        {
            HTTP::redirect('../admin.php','You are currently using this account');
        }        
    }
   
};
