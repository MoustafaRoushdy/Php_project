<?php

class loginController extends login{

    private $email;
    private $password;
    
   
   

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }


    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
     
       
    }
     public function loginUser(){
        $result;
        if($this->emptyInput()==false){
            //echo empty input
            header("location: ../index.php?error=emptyInput");
            exit();
        }
     
         $this->getUser($this->email,$this->password,);
    }
    private function emptyInput(){
        $result;
        if(empty($this->email) || empty($this->password)){
          $result = false  ;
        }
        else{
            $result = true;
        }
        return $result;
    }
  
}
