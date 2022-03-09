<?php

class signUpController extends signUp{

    private $userName;
    private $password;
    private $repeatPassword;
    private $email;
    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRepeatPassword() {
        return $this->repeatPassword;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setUserName($userName): void {
        $this->userName = $userName;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setRepeatPassword($repeatPassword): void {
        $this->repeatPassword = $repeatPassword;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function __construct($userName, $password, $repeatPassword, $email) {
        $this->userName = $userName;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
        $this->email = $email;
    }
     public function signUpUser(){
        $result;
        if($this->emptyInput()==false){
            //echo empty input
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if($this->invalidUserName()==false){
            //echo invalid user name
            header("location: ../index.php?error=userName");
            exit();
        }
        if($this->invalidEmail()==false){
            //echo invalid email
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->matchPassword()==false){
            //echo invalid matching password
            header("location: ../index.php?error=matchPassword");
            exit();
        }
         if($this->userNameTakenCheck()==false){
            //echo invalid user or email
            header("location: ../index.php?error=useroremailtaken");
            exit();
           
        }
         $this->setUser($this->userName,$this->password,$this->email);
    }
    private function emptyInput(){
        $result;
        if(empty($this->userName) || empty($this->password) || empty($this->repeatPassword) || empty($this->email)){
          $result = false  ;
        }
        else{
            $result = true;
        }
        return $result;
    }
    // function for validation of username
    private function invalidUserName() {
        $result;
        if(!preg_match('/^[a-z0-9\-]+$/i', $this->userName)){
          $result = false  ; 
        }
        else{
            $result = true;
        }
        return $result;
    }
    // function for validation of email
    private function invalidEmail() {
        $result;
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result = false  ; 
        }
        else{
            $result = true;
        }
        return $result;  
    } 
    // function for validation of match the password and the repeated password
    private function matchPassword() {
        $result;
        if($this->password !== $this->repeatPassword){
            $result=false;
        }
            else{
                $result=true;
        }
        return $result;
    }
    // to check for the username and email
     private function userNameTakenCheck() {
        $result;
        if(!$this->checkUser($this->userName,$this->email)){
            $result=false;
        }
            else{
                $result=true;
        }
        return $result;
    }
}
