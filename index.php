<?php
 session_start();
  require_once('vendor/autoload.php');
define('CSSPATH', 'View/CSS/'); //define css path
$cssItem = 'style.css'; //css item to display
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login page</title>

        <link rel="stylesheet" href="<?php echo (CSSPATH . "$cssItem"); ?>" type="text/css">

    </head>
    <body>
        <div class="login-wrap">
            <!--      form for login-->

            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">
                    <form id="loginForm" action="Model/login.php" method="POST" enctype="multipart/form-data">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="user" class="label">Email</label>
                                <input id="user" type="text" class="input" 
                                       >
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" type="password" class="input" data-type="password"
                                       >
                            </div>
                            <div class="group">
                                <input id="check" type="checkbox" class="check" checked>
                                <label for="check"><span class="icon"></span> Remember Me</label>
                            </div>
                            <div class="group">
                                <input type="submit"  name="submit" class="button" value="Log In">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <a href="#forgot">Forgot Password?</a>
                            </div>
                        </div>
                    </form>

                    <!--      form for Sign up-->
                    <div class="sign-up-htm">
                        <form id="signupForm" action="../PhpProject_1/Model/signup.php" method="POST" enctype="multipart/form-data">
                            <div class="group">
                                <label for="user" class="label">Username</label>
                                <input id="user" type="text" name="username" class="input">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" type="password" name="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Repeat Password</label>
                                <input id="pass" type="password" name="repeatPassword" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Email Address</label>
                                <input id="pass" type="email" name="email" class="input">
                            </div>
                            <div class="group">
                                <input type="submit" name="submit" class="button" value="Sign Up">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <label for="tab-1">Already Member?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>