<?php

require_once("vendor/autoload.php");

use Faker\Provider\UserAgent;
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\showMessage;


$db = new UsersTable(new MySQL());

$user = $db->getOne($id=3);
print_r($user);

