<?php

/*******************dispalying errors*****************************/
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
    private $user;
                
    function __construct()
    {
       
        $this->database = new Dbconnection();  //creating object from database
        $this->user_table = $this->database->getTableName("users"); //using table users
        
    }

    public function login($user_name , $user_password , $remember_me) 
    {
        $this->user = $this->user_table->where('user_email','like',$user_name,"and")
                            ->where("user_password","like",$user_password,"and")
                            ->first();   //first not get --> to return non associatve array

                            if (!$this->user)
                            {
                                $_SESSION["wrong pass"] = TRUE;
                            }

                            else if ($remember_me == "on")
                            {
                                $_SESSION["id"] = $this->user->user_id;
                                $cookie_name = "checked";
                                $cookie_value = $this->user->user_id;
                                setcookie($cookie_name, $cookie_value, time() + (60), "/"); 
                                $_SESSION["wrong pass"] = FALSE;

                            }

                            else
                            {
                                $_SESSION["id"] = $this->user->user_id;
                                $_SESSION["wrong pass"] = FALSE;
                            }

}
}




// echo "<pre>";
// print_r($user);
// echo "<pre>";  