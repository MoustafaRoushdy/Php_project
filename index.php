<?php

//***********************displaying errors***************************************** */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
require_once ("vendor/autoload.php");
header("Location:View/login.php");


if(isset($_POST["username"]))
{
    
    $x = new Visitor();
}
echo "<h5>hello</h5>";
if(!isset($_SESSION["mail"]))
{
   // header("Location:View/login.php");
}
else if(isset($_SESSION["mail"]))
{
    header("Location:View/download.php");
}




















