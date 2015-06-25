<?php
	//require("config.inc.php");
	
	// Get image string posted from Android App
	$base=$_REQUEST['image'];
	// Decode Image
	$binary=base64_decode($base);
	header('Content-Type: bitmap; charset=utf-8');
		
	$file = fopen('image.png', 'wb');
	// Create File
	fwrite($file, $binary);
	fclose($file);
	echo 'Image upload complete, Please check your php file directory';
	
	$fp = fopen('testfile.txt', 'w');
	fwrite($fp, $binary);
	fclose($fp);
	
	//Database Entry Code
	
	//Adding a time Stamp
	
	$today=getdate();
	$postdate=$today['yday'];
	
    $name= 'image.png';
    $image= $base;

	$con=mysql_connect("localhost","kaif15","real madrid");
    mysql_select_db("flyers",$con);
    $qry="insert into bulletin (name,flyer,PostDate) values ('$name','$image','$postdate')";
    $result=mysql_query($qry,$con);	
	mysql_close($con);
	
	
?>