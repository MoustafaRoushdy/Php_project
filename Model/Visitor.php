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
        
        self::login($user_email, $password);
    }
    
    static function login($user_email ,$password) {


        if($user_table->where('user_email','like',$user_email,"and")->where("user_password","like",$password,"and")->exists())
        {
            echo "wrong mail or password";
        }
        else{
            echo "running good";
        }
            
    }
}
