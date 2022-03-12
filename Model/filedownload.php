<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Illuminate\Database\Capsule\Manager as Capsule;
require "../vendor/autoload.php";


class filedownload{
    
   
    static function todownload(){
             filedownload::connect();
            if(self::getcounter()<7)
            {  session_start();
                    
                   $_SESSION["file"]=filedownload::getpath();
                     header("Location:downloadpage.php",true,301);
                                   exit();
            }else{echo "you are done ";}
    }
    //connection to database
    static function connect(){  
        $connectdb = new Dbconnection();


        
    }

    //get order counter
    static function getcounter(){
        $requrd= Capsule::table("orders")->where("user_id",1)->get();
           foreach ($requrd as $item) {
                $counter= $item->counter;
         }
         return $counter;
         
    }  
    //set order counter
    static function setcounter(){
        $newcounter=self::getcounter()+1;
        Capsule::table('orders')->where("user_id",1)->update(["counter" => $newcounter]);
    }
    //get recant path
    static function getpath(){
        $requrd= Capsule::table("products")->where("product_id",1)->get();
        
            foreach ($requrd as $item) {
                $path= $item->download_file_link;
         }
        
        return $path;
    }
    
    
    // change path
    static function changepath($filepath){
                 
                 $newname="text".rand().".txt";
                 rename($filepath,$newname) ;
                 Capsule::table('products')->where("product_id",1)->update(["download_file_link" => $newname]);
                
    }
    
    
    //log out
   static  function logout(){
            session_unset();
            session_destroy();
           setcookie("checked", "", time()-(60*60*24*7));
            unset($_COOKIE["checked"]);
            header("Location:login.php",true,301) ;

            exit();
}
}
