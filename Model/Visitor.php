<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    
       public function login($user_name , $user_password) {


        if($this->user_table->where('user_email','like',$user_name,"and")->where("user_password","like",$user_password,"and")->exists())
        {
            if (!isset($_SESSION["mail"]))
            {
                $_SESSION["mail"] = $user_name;
         
          //  header("Location:View/download.php");
            echo "hello";
             }
        else{
            $_SESSION["wrong_password"] = TRUE;
        }
            
    }
}
}
