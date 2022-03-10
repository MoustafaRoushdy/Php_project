 <?php
 if(isset($_SESSION["mail"])) {
       require_once("vendor/autoload.php");
       require_once("views/download view.php");
       
       //if user click download buuton
      if(isset($_POST["download"])){
                     filedownload::todownload();
                }
       //if user click logout buuton
      if(isset($_POST["logout"])){
            filedownload::logout();
        }
 }else {
       header("Location:loginbage.php",true,301);
                                       exit();
 }
?>
