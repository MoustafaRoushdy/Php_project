<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once ("../vendor/autoload.php");


if(isset($_POST["username"]))
{
    
    $visitor = new Visitor();
    $visitor->login($_POST["username"],$_POST["password"],$_POST["remember_me"]);

}
/*
if(!isset($_SESSION["mail"]))
{
    header("Location:login.php");
}
else if(isset($_SESSION["mail"]))
{
    header("Location:downloadpage.php");
}
*/
?>

<html>   
    <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> Login Page </title>  
    <link rel="stylesheet" href="login.css">
    </head> 
    <center>   
        <body>    
            <h1>Login Form </h1>   
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
                <div class="container">   
                    <label>Username : </label>   
                    <input type="text" placeholder="Enter Username" name="username" required>  
                    <label>Password : </label>   
                    <input type="password" placeholder="Enter Password" name="password" required>  
                    <button type="submit">Login</button>   
                    <center><input type="checkbox" checked="checked" name = "remember_me"> Remember me </center>
                    <h5><?php 
                        // if (isset($_SESSION["mail"]) && $_SESSION != "wrong")
                        // echo "you are redircted to download page";
                        // else if (isset($_SESSION["wrong_password"]) && $_SESSION["wrong_password"] == TRUE)
                        // echo "wrong user name and password";
                        ?></h5>
                </div>   
            </form>     
        </body>    
    </center>  
    </html>  
