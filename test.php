<?php

	$con=mysql_connect("localhost","kaif15","real madrid");
    mysql_select_db("flyers",$con);
    $qry="SELECT * FROM bulletin ORDER BY id DESC LIMIT 3";
    $result=mysql_query($qry,$con);	
	
	$i = 0;
	
	while($sqldata=mysql_fetch_array($result)){
		$data[$i] =  array('name' => $sqldata['name'], 'data' =>$sqldata['flyer'], 'date' => $sqldata['PostDate']);
		$i++;
	}
	
	$data = json_encode($data);
	
	echo $data;
	
	mysql_close($con);
?>