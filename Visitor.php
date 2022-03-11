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
    $x = new Visitor($_POST["username"],$_POST["password"],$_POST["checked"],$user_table);
}

/**
 * Description of Visitor
 *
 * @author 
 */
class Visitor {
    private $user_name;
    private $password;
    private $rememberMe;
                
    function __construct($user_email ,$password,$rememberMe)
    {
        echo "constructor".PHP_EOL;
        $this->user_email = $user_email;
        $this->password = $password;
        $this->rememberMe = $rememberMe;
        
        self::login($user_email, $password,$rememberMe);
    }
    
    static function login($user_email ,$password,$rememberMe) {


        if(Capsule::table("users")->where('user_email','like',$user_email,"and")->where("user_password","like",$password,"and")->exists())
        {
            $_SESSION["mail"] = $user_email;
            if (isset($rememberMe)) {
                $cookie_name = "checked";
                $cookie_value = $_SESSION["mail"];
                setcookie($cookie_name, $cookie_value, time() + (60), "/"); 
            }
            else{
                header("location:../downloadarea.php");  
            }
            header("location:../downloadarea.php");
 
        }
        else{
            echo "<h5>wrong username or password</h5>"; //how to display it in the end of the page
        }
            
    }
}
require_once("View/login.php");




?>














