<?php

//***********************displaying errors***************************************** */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
require_once ("vendor/autoload.php");
use Illuminate\Database\Capsule\Manager as Capsule;

/***********************connecting to the database*********************************** */
$capsule = new Capsule;
$capsule->addConnection([
    "driver"=>_driver_,
    "host"=>_host_,
    "database"=>_database_,
    "username"=>_username_,
    "password"=>_password_
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$user_table = Capsule::table("users");



if(isset($_POST["username"]))
{
    $x = new Visitor($_POST["username"],$_POST["password"],$user_table);
}

/**
 * Description of Visitor
 *
 * @author moustafa
 */
class Visitor {
    private $user_name;
    private $password;
                
    function __construct($user_email ,$password)
    {
        echo "constructor".PHP_EOL;
        $this->user_email = $user_email;
        $this->password = $password;
        
        self::login($user_email, $password);
    }
    
    static function login($user_email ,$password) {


        if(Capsule::table("users")->where('user_email','like',$user_email,"and")->where("user_password","like",$password,"and")->exists())
        {
            if (!isset($_SESSION["mail"]) || $_SESSION["mail"] == null)
            {
                echo 'i am here';
                $_SESSION["mail"] = $user_email;
                var_dump($_SESSION["mail"]);

            }
            else{
                var_dump($_SESSION["mail"]);
            }
            echo "corect username and password";
        }
        else{
            echo "<h5>wrong username or password</h5>"; //how to display it in the end of the page
        }
            
    }
}
require_once("View/login.php");




?>














