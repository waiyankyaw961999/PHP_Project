<?php

namespace Helpers;
session_start();

class Auth
{
    static function check()
    {
        
        if(isset($_SESSION['user']))
            {
                return $_SESSION['user'];
            }
            else
            {
                HTTP::redirect('index.php');
            }
    }

    static function validate($data)
    {
        $error = [];
        $keys = array_keys($data);
        for($x = 0; $x<sizeof($data);$x++)
        {

            if($data[$keys[$x]] == "")
            {
                
                array_push($error,$keys[$x]);                
            };

            $test_input = trim($data[$keys[$x]]);
            $test_input = stripslashes($data[$keys[$x]]);
            $test_input = htmlspecialchars($data[$keys[$x]]);

            $data[$keys[$x]]= $test_input;            
        };
        $data['error']= $error;

        return $data;
       
    }
    


}