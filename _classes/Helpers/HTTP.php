<?php 

namespace Helpers;
session_start();

class HTTP
{
    static $baseurl = "http://localhost:1800/";  

    public static function redirect($path,$message="")
    {
        $url = static::$baseurl . $path;

        if($message !== "")
        {
            $_SESSION['message'] = $message; 
        } 

        header("location:$url");
        exit();
        }
    }

