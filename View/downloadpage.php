<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

    require('../Model/filedownload.php');

use Illuminate\Database\Capsule\Manager as Capsule;
if(isset($_SESSION["id"])|| isset($_COOKIE["checked"])) {          //this line
	require "../vendor/autoload.php";


filedownload::connect();

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

       header("Location:login.php",true,301);
        exit();
 }
?>
<!DOCTYPE html>

<html>
<head>
	<title>Download File using PHP</title>
	<style>
		body{
			background-image: url("image.jpg");
			background-size: 2000px;
		}
		.container{
			margin: auto;
			margin-top: 100px;
			width:320px;
			height: 300px;
			padding: 16px;
			color: #f2f3f4;
		}
		h1{
			color: #8B0000;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Download Page </h1>
		<h2  > <?php echo "XYZ_OS42.txt   sizeof: 1kb";?> </h2>

		<a href="downloadpage.php?file=<?php echo $path ?>">click HERE</a> to download
	</div>


</body>
</html>
