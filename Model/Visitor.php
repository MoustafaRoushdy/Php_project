<?php

/**
 * Description of Visitor
 *
 * @author moustafa
 */
class Visitor {
    private $user_name;
    private $password;
                
    function __construct($user_name ,$password)
    {
        echo "constructor".PHP_EOL;
        $this->user_name = $user_name;
        $this->password = $password;
        
        self::login($user_name, $password);
    }
    
    static function login($user_name ,$password) {
        
        echo 'login'.PHP_EOL;
        if($user_name === "admin" && $password === "1234")//i have problem here with username and password
        {
            if (!isset($_SESSION["is_counted"]) || $_SESSION["is_counted"] == false)
            {
                echo 'in the right if'.PHP_EOL;
                Counter::increase();
                $_SESSION["is_counted"] = true;
            }
            else
            {
                echo "seems that is counter is true\n";
            }
        }
        else
        {
            echo "worng user name or password";
            
        }
          
        
    }
}
