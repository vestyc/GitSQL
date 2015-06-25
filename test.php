<?php

	$con=mysql_connect("localhost","kaif15","real madrid");
    mysql_select_db("flyers",$con);
    $qry="SELECT * FROM bulletin ORDER BY PostDate DESC LIMIT 2";
    $result=mysql_query($qry,$con);	
	
	$sqldata=mysql_fetch_array($result);
	$sqldata=mysql_fetch_array($result);
	$data = array('name' => $sqldata['name'], 'data' =>$sqldata['flyer'], 'date' => $sqldata['PostDate']);
	
	echo '<img height="480" width="640" src="data:image;base64,'.$data['data'].' "> ';
	//Putting data into json format and echoing back to android
	$data = json_encode($data);
	echo $data;
	
	mysql_close($con);

?>