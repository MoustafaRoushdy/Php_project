 <?php
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
?>
