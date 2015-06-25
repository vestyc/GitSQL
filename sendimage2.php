<?php  
//$json=$_GET ['json'];
$json = file_get_contents('php://input');
$obj = json_decode($json);
//echo $json;

	//Adding a time Stamp
	
	$today=getdate();
	$postdate=$today['yday'];
	
	//Getting data from json_obj
	
	$name=$obj['FileName'];
	$image=$obj['image'];
	$image=base64_decode($image);


//Save
$con = mysql_connect('localhost','kaif15','real madrid') 
       or die('Cannot connect to the DB');
mysql_select_db("flyers",$con);
  
$qry="INSERT INTO bulletin (name,flyer,PostDate) VALUES ('$name','$image','$postdate')";
//mysql_query("INSERT INTO bulletin (name,flyer,PostDate)
//VALUES ('".$obj->{'FileName'}."', '".$obj->{'image'}."',$postdate)");

$result=mysql_query($qry,$con);
mysql_close($con);
//
  //$posts = array($json);
  $posts = array(1);
    header('Content-type: application/json');
    echo json_encode(array('posts'=>$posts)); 
  ?>