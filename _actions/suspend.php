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
    $db->suspend($_GET['id']);

    HTTP::redirect('../admin.php');
}