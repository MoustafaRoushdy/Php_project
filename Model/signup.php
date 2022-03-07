<?php
// Grapping the data
if(isset($_POST["submit"])){
    $userName= $_POST["username"];
    $password= $_POST["password"];
    $repeatPassword= $_POST["repeatPassword"];
    $email= $_POST["email"];
}
// instantiate the Controller class
require_once '../Controller/databaseController.class.php';
require_once '../Controller/signUp.class.php';
require_once '../Controller/signUpController.class.php';
$signUp = new signUpController($userName, $password, $repeatPassword, $email);
// Running Error Handlers and user SignUps
$signUp->signUpUser();
// going to back to front page
header("location: ../index.php?error=none");
