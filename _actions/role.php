<?php
require_once("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

Auth::check();
if($_GET['id'] and $_GET['role'])
{
  
    $id = $_GET['id'];
    $role = $_GET['role'];
    $db = new UsersTable(new MySQL());

    $db->changerole($id,$role);

    HTTP::redirect('../admin.php');
}