<?php

require_once("vendor/autoload.php");

use Faker\Provider\UserAgent;
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\showMessage;


$db = new UsersTable(new MySQL());

$role = 3;
$id = 3;
$db->changerole($id,$role);