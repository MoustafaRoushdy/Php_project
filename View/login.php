<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once ("../vendor/autoload.php");

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
    $visitor->login($_POST["username"],$_POST["password"],$_POST["remember_me"]="off");

}

?>

<html>   
    <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> Login Page </title>  
    <link rel="stylesheet" href="login.css">
    </head> 
      
        <body> 
        <div class="new-user">   
           <center> <h2>Login</h2> </center>  
            <form  method="POST" >
                <!-- <div class="container">    -->
                    <label>User Email : </label>   
                    <input type ="text" name="username" required>  
                    <label>Password : </label>   
                    <input type="password"  name="password"  required> 
                  
                      <label><input class="check-dis"type="checkbox" checked="checked" name = "remember_me"> Remember me</label> 
                   
                    <input type="submit" value="submit" name="submit" > 
                    <h5><?php 
                        if (isset($_SESSION["wrong pass"])&& $_SESSION["wrong pass"]== TRUE )
                        echo "wrong user name and password";
                        else echo ""
                        ?></h5>
            </form>  
</div>   
        </body>    
    
    </html>  
    <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->