<?php

/**
 * Description of Visitor
 *
 * @author moustafa
 */
class Visitor {
    
    private $user_table;
                
    function __construct()
    {
       
        $this->database = new Dbconnection();  //creating object from database
        $this->user_table = $this->database->getTableName("users"); //using table users
        
    }
    
       public function login() {


        if($this->user_table->where('user_email','like',$_POST["username"],"and")->where("user_password","like",$_POST["password"],"and")->exists())
        {
            if (!isset($_SESSION["mail"]))
            {
                $_SESSION["mail"] = $user_email;
            }
            header("Location:View/download.php");
            echo "hello";
        }
        else{
            $_SESSION["wrong_password"] = TRUE;
        }
            
    }
}
