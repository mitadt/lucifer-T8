<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include'connection_demo.php';
retrieve();
}

function retrieve(){
global $connect;

//$query="SELECT * FROM complaints;";
$e_id=$_POST["e_id"];
$query="SELECT * FROM emp WHERE e_id='$e_id';";

$result=mysqli_query($connect,$query);
$no_of_row=mysqli_num_rows($result);

$temp_array=array();

if($no_of_row>0){
	while($row=mysqli_fetch_assoc($result)){
		$temp_array[]=$row;	
	}
	header('Content-Type: application/json');
	echo json_encode(array("emp_data"=>$temp_array));
}
else{
	echo "Unsuccessfully";
}


mysqli_close($connect);
}
?>