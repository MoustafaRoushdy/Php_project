<?php
class databaseController{
    protected function connect(){
try {
    $databaseUserName ="root";
    $databasePassword ="";
    $databaseConnection = new PDO("mysql:host=localhost;dbname=student",$databaseUserName,$databasePassword);
    return $databaseConnection;
} catch (Exception $exc) {
    print "Error!" .$exc->getMessage() ."<br>";
    die();
}
    }
}
