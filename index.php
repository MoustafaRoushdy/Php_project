<?php

//***********************displaying errors***************************************** */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
require_once ("vendor/autoload.php");


if(isset($_POST["username"]))
{
    
    $x = new Visitor($_POST["username"],$_POST["password"]);
    echo "hello";
}

require_once("View/login.php");




















