<?php	
	
	//added code to retrieve bitmap from MySQL database
	
	//$index = $_REQUEST['index'];
	$index = 0;
	
	//Retrieving the latest uploaded record to database
	//Index is the number of records to skip
	
	
	$con=mysql_connect("localhost","kaif15","real madrid");
    mysql_select_db("flyers",$con);
	
	//Number of Records in Database
	$qry="SELECT COUNT(*) FROM bulletin";
    $result=mysql_query($qry,$con);	
	$sqldata=mysql_fetch_array($result);
	
	$records = $sqldata[0];
	$records = $records - 3;

	if($index<=$records){
		$qry="SELECT * FROM bulletin ORDER BY id DESC LIMIT 3";
		$result=mysql_query($qry,$con);	
			
		$i = 0;
	
		while($sqldata=mysql_fetch_array($result)){
			$data[$i] =  array('name' => $sqldata['name'], 'data' =>$sqldata['flyer'], 'date' => $sqldata['PostDate']);
			$i++;
		}

		//Putting data into json format and echoing back to android
		$data = json_encode($data);
		echo $data;
		
		mysql_close($con);
	}
    
	else{
		$data = array('name' => 'database_full', 'data' =>'data', 'date' => 'date');
		$data = json_encode($data);
		echo $data;
		
		mysql_close($con);
	}
	
	
?>