
<html>   
    <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> Login Page </title>  
    <link rel="stylesheet" href="login.css">
    </head> 
    <center>   
        <body>    
            <h1>Login Form </h1>   
            <form method="post"  >  
                <div class="container">   
                    <label>Username : </label>   
                    <input type="text" placeholder="Enter Username" name="username" required>  
                    <label>Password : </label>   
                    <input type="password" placeholder="Enter Password" name="password" required>  
                    <button type="submit">Login</button>   
                    <center><input type="checkbox" checked="checked"> Remember me </center>
                    <h5><?php 
                        if (isset(_SESSION["mail"]) && _SESSION != "wrong")
                        echo "you are redircted to download page";
                        else if (_SESSION["mail"] == "worng" )
                        echo "wrong user name and password";
                        ?></h5>
                </div>   
            </form>     
        </body>    
    </center>  
    </html>  

    <!-- action='<?php //echo $_SERVER["PHP_SELF"];  ?>'-->