<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
           require_once('vendor/autoload.php');
          
           use Illuminate\Database\Capsule\Manager as capsule;
           $capsule = new capsule();
//         $information=  $capsule->addConnection([
//'driver'   => _driver_,
//'host'     => _host_,
//'database' => _database_,
//'username' => _username_,
//'password' => _password_,
//]);
           $capsule->setAsGlobal(); 
           $capsule->bootEloquent();
       require_once './View/Login.php';
       
        ?>
    </body>
</html>
