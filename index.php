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
                $_SESSION["mail"] = $user_email;
            }
            echo "corect username and password";
        }
        else{
            echo "<h5>wrong username or password</h5>"; //how to display it in the end of the page
        }
            
    }
}




?>















<html>   
    <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> Login Page </title>  
    <style>   
    Body {  
      font-family: Calibri, Helvetica, sans-serif;  
    }  
    button {   
           background-color: #4CAF50;   
           width: 100%;  
            color: orange;   
            padding: 15px;   
            margin: 10px 0px;   
            border: none;   
            cursor: pointer;   
             }   
     form {   
            border: 3px solid #f1f1f1;   
        }   
     input[type=text], input[type=password] {   
            width: 100%;   
            margin: 8px 0;  
            padding: 12px 20px;   
            display: inline-block;   
            border: 2px solid green;   
            box-sizing: border-box;   
        }  
     button:hover {   
            opacity: 0.7;   
        }   
      .cancelbtn {   
            width: auto;   
            padding: 10px 18px;  
            margin: 10px 5px;  
        }   
    <head>  
    <title> Login Page </title>  
    <style>   
    Body {  
      font-family: Calibri, Helvetica, sans-serif;  
      background-color: pink;  
    }  
    button {   
           background-color: #4CAF50;   
           width: 100%;  
            color: orange;   
            padding: 15px;   
            margin: 10px 0px;   
            border: none;   
            cursor: pointer;   
             }   
     form {   
            border: 3px solid #f1f1f1; 
            width : 300pt;   
        }   
             input[type=text], input[type=password] {   
            width: 100%;   
            margin: 8px 0;  
            padding: 12px 20px;   
          
         
     .container {   
            padding: 25px;   
            background-color: lightblue;  
        }   
    </style>   
    </head> 
    <center>   
        <body>    
            <h1>Login Form </h1>   
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];  ?>">  
                <div class="container">   
                    <label>Username : </label>   
                    <input type="text" placeholder="Enter Username" name="username" required>  
                    <label>Password : </label>   
                    <input type="password" placeholder="Enter Password" name="password" required>  
                    <button type="submit">Login</button>   
                    <center><input type="checkbox" checked="checked"> Remember me </center>
                </div>   
            </form>     
        </body>    
    </center>  
    </html>  
