<?php
session_start();

include("../vendor/autoload.php");
use Helpers\Auth;
use Helpers\HTTP;


$user = Auth::check();
unset($_SESSION['user']);

HTTP::redirect('../index.php',"Logout Success");