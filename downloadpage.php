<?php 
use Illuminate\Database\Capsule\Manager as Capsule;
 if(isset($_SESSION["flag"]) &&isset($_SESSION["flag"])==true){
require_once("vendor/autoload.php");


filedownload::connect();
session_start();
$path=$_SESSION["file"];

if(isset($_GET["file"]))
{
	$filename = basename($_GET['file']);
	$filepath =  $filename;
	if(!empty($filename) && file_exists($filepath)){
            

//Define Headers
		header("Cache-Control: public");
		header("Content-Description: FIle Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("Content-Transfer-Emcoding: binary");
		readfile($filepath);
                
                filedownload::changepath($filepath) ;
                filedownload::setcounter();
                                       exit();
                 
		
                
                   
 
	}
	else{
		echo "This File Does not exist.";
	}
          header("Location:downloadarea.php",true,301);
                                       exit();
} }else {
       header("Location:loginbage.php",true,301);
                                       exit();
 }
?>
<!DOCTYPE html>

<html>
<head>
	<title>Download File using PHP</title>
</head>
<body>

<h2>Download File from HERE : </h2>
<h2  > <?php echo "text2.txt   sizeof: 1kb";?> </h2>

<a href="downloadpage.php?file=<?php echo $path ?>">click HERE</a>



</body>
</html>
