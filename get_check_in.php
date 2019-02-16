<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
require 'connection_demo.php';
add();
}

function add(){
global $connect;

$e_id=$_POST["e_id"];
$check_in=$_POST["check_in"];


$query="SELECT * FROM attendance_info WHERE e_id='$e_id' AND  SUBSTR(check_in ,1,10) = SUBSTR('$check_in',1,10);";

$result=mysqli_query($connect,$query);
$no_of_row=mysqli_num_rows($result);

$temp_array=array();

if($no_of_row>0){
	while($row=mysqli_fetch_assoc($result)){
		$temp_array[]=$row;	
	}
	header('Content-Type: application/json');
	echo json_encode(array("check_in_"=>$temp_array));
}
else{
	echo "Unsuccessfully";
}

mysqli_close($connect);

}
?>