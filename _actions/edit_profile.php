<?php
session_start();
require_once("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$db = new UsersTable(new MySQL());

if($_GET['id'])
    {
        $current_user = $db->getOne($_GET['id']);
    }


$data =  
    [
        'name'=>$_POST['name'] !== "" ? $_POST['name']:$current_user['name'],
        'phone'=>$_POST['phone'] !== "" ? $_POST['phone']:$current_user['phone'],
        'email'=>$_POST['email'] !== "" ? $_POST['email']:$current_user['email'],
        'password'=>$_POST['password'] !==""? md5($_POST['password']):$current_user['password'],
        'city'=>$_POST['city'] !== "" ? $_POST['city']:$current_user['city'],
        'state'=>$_POST['state'] !== "" ? $_POST['state']:$current_user['state'],
        'zip'=>$_POST['zip'] !== "" ? $_POST['zip']:$current_user['zip'],
    ];
    
    $name = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmp = $_FILES['photo']['tmp_name'];
    $type = $_FILES['photo']['type'];

    $validate_data = Auth::editValidate($data); 
   

    if($validate_data)
    {
        $data = $validate_data; 
        $data['address'] = $data['city'].', '.$data['state'].', '.$data['zip'];

        unset($data['city']);
        unset($data['state']);
        unset($data['zip']);
        
    
        if($name ==="")
        {            
         
            $data['photo'] = $current_user['photo'];
        }
        else
        {
            move_uploaded_file($tmp,"photos/$name");
            $data['photo'] = $name;
        }
      
    $db->update($data);       
    
    HTTP::redirect('../admin.php','Success Updating Your Profile');
    }
