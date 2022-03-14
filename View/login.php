<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once ("../vendor/autoload.php");
// $y =Token::is_token_exists($_COOKIE["value"],$_COOKIE["token"]);
// var_dump($y);
if(isset($_COOKIE["checked"]))
{
    header("Location:downloadarea.php");
}
else
 if(isset($_SESSION["id"]))
{
    header("Location:downloadarea.php");
}
else 
if(isset($_POST["username"]))
{
    
    $visitor = new Visitor();
    $visitor->login($_POST["username"],$_POST["password"],$_POST["remember_me"]);

}

?>

<html>   
    <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> Login Page </title>  
    <link rel="stylesheet" href="login.css">
    </head> 
    <center>   
        <body>    
            <h1>Login here</h1>   
            <form  method="POST" >
                <div class="container">   
                    <label>Useremail : </label>   
                    <input placeholder="Enter Useremail" name="username" required>  
                    <label>Password : </label>   
                    <input type="password" placeholder="Enter Password" name="password"  required>  
                    <button type="submit">Login</button>   
                    <center><input type="checkbox" checked="checked" name = "remember_me"> Remember me </center>
                    <h5><?php 
                        if (isset($_SESSION["wrong pass"])&& $_SESSION["wrong pass"]== TRUE )
                        echo "wrong user name and password";
                        else echo ""
                        ?></h5>
                </div>   
            </form>     
        </body>    
    </center>  
    </html>  
    <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->