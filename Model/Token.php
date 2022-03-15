<?php

class Token
{
    private $token;

    public function __construct($user_id)
    {
        $this->token = sha1(rand(1000,2000));
        var_dump($this->token);
        $db = new Dbconnection();
        $db->getTableName("tokens")->insert(["user_id"=>$user_id,"remember_me_token"=>$this->token]);
        
    }

    public function get_cookie_token()
    {
        return $this->token;
    }

    public static function is_token_exists ($user_id,$cookie_token)
    {
        if($user_id == null || $cookie_token == null)
        {
            return 0 ; 
        }
        $db = new Dbconnection();
        $user = $db->getTableName("tokens")->where("user_id","=",$user_id,"and")
                                        ->where("remember_me_token","like",$cookie_token,"and")
                                        ->first();
                                
        return $user->user_id;
    }
}