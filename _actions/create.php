<?php
session_start();
require_once("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

if(isset($_POST))
{
    if ($_FILES['photo'] =="")
    {
        $_FILES['photo']['name']='../img/blank_profile.webp';
    };
    $data = [
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'phone'=>$_POST['phone'],
        'password'=>$_POST['password'],
        'address'=>$_POST['address']. ', '.$_POST['state'].', '.$_POST['zip'],
    ];
    
    $validate_data = Auth::validate($data);
    
    if($validate_data['error'])
    {
        HTTP::redirect('register.php',$validate_data['error']);
    }
    else
    {

    }


}


