<?php
session_start();
require_once("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

if(isset($_POST))
{
 
    $data = [
        'name'=>$_POST['name'],
        'phone'=>$_POST['phone'],
        'email'=>$_POST['email'],
        'password'=>md5($_POST['password']),
        'city'=>$_POST['city'],
        'state'=>$_POST['state'],
        'zip'=>$_POST['zip']
    ];
    
    $name = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmp = $_FILES['photo']['tmp_name'];
    $type = $_FILES['photo']['type'];

    $validate_data = Auth::validate($data); 

    if($validate_data['error'])
    {
        HTTP::redirect('register.php',$validate_data['error']);
    }
    else
    {
        $data = $validate_data;
        
        $data['address'] = $data['city'].', '.$data['state'].', '.$data['zip'];
        $data['roles_id'] = 1;
        unset($data['city']);
        unset($data['state']);
        unset($data['zip']);
        unset($data['error']);
        
        $db = new UsersTable(new MySQL());
        if(!isset($name))
        {            
            $data['photo'] = NULL;
        }
        else
        {
            move_uploaded_file($tmp,"photos/$name");
            $data['photo'] = $name;
        }
        $db->insert($data);       
        HTTP::redirect('index.php','Success Registration.');

    }


}


