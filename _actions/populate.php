<?php
require_once("../vendor/autoload.php");

use Faker\Factory as Faker;
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;


$faker = Faker::create();
$table = new UsersTable(new MySQL());

if($table)
{
    echo ("Databases connected.\n");
    for($i = 0;$i<10;$i++)
    {
        $data = [

        'name'=>$faker->name,
        'phone'=>$faker->phoneNumber,
        'email'=> $faker->email,
        'password'=>md5('password'),
        'address'=>$faker->address,      
        'roles_id'=> $i <5 ? rand(1,3):1
        ];
        $table->insert($data);
    }
    echo '<br>';
    echo "Done Creating Fake Data:";
}

