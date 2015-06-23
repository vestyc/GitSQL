<?php	
	
	//add code to retrieve bitmap from MySQL database
	$imageData = file_get_contents('testfile.txt');
	$imageData = base64_encode($imageData);	
	$data = array('name' => 'image.png', 'data' => $imageData, 'date' => 53);
	
	//Putting data into json format and echoing back to android
	$data = json_encode($data);
	echo $data;
?>