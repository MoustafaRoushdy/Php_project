<?php
// Grapping the data
if(isset($_POST["submit"])){
    $email= $_POST["email"]; 
    $password= $_POST["password"];
   
    
}
// instantiate the Controller class
require_once '../Controller/databaseController.class.php';
require_once '../Controller/login.class.php';
require_once '../Controller/loginController.class.php';
$login = new loginController($email, $password);
// Running Error Handlers and user SignUps
$login->loginUser();
// going to back to front page
header("location: ../View/memberArea.php");
