<?php

namespace Helpers;

class showMessage
{
    static function session_message()
    {
        if(isset($_SESSION['message']))
        {
            $message = $_SESSION['message'];
            echo "<div class='text-center alert alert-danger'>$message</div>";
        }
        unset($_SESSION['message']);
    }
}