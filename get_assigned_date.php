<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
require 'connection_demo.php';
retrieve();
}

function retrieve(){
global $connect;

$t_id=$_POST["t_id"];

$query="SELECT * FROM task WHERE t_id='$t_id' ;";

$result=mysqli_query($connect,$query);
$no_of_row=mysqli_num_rows($result);

$temp_array=array();

if($no_of_row>0){
	while($row=mysqli_fetch_assoc($result)){
		$temp_array[]=$row;	
	}
	header('Content-Type: application/json');
	echo json_encode(array("get_assigned_date"=>$temp_array));
}
else{
	echo "Unsuccessfully";
}

mysqli_close($connect);

}
?>