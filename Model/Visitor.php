<?php

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
        $this->database = new Dbconnection();
        $this->user_table = $this->database->getTableName("users");
        
        $this->login($user_email, $password);
        
    }
    
       public function login($user_email ,$password) {


        if($this->user_table->where('user_email','like',$user_email,"and")->where("user_password","like",$password,"and")->exists())
        {
            if (!isset($_SESSION["mail"]))
            {
                $_SESSION["mail"] = $user_email;
            }
            header("Location:View/download.php");
        }
        else{
            echo "<h5>wrong username or password</h5>";
        }
            
    }
}
