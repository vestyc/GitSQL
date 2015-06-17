<?php
	require("config.inc.php");
	
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
?>