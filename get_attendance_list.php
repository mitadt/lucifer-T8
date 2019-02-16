<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include'connection_demo.php';
retrieve();
}

function retrieve(){
global $connect;

$e_id=$_POST["e_id"];

$query="SELECT a_id,e_id,SUBSTR(check_in,1,10) check_in_date,SUBSTR(check_in,11,19) check_in_time, SUBSTR(check_out,1,10) check_out_date,SUBSTR(check_out,11,19) check_out_time, time_diff FROM attendance_info WHERE e_id='$e_id' ORDER BY a_id DESC;";

$result=mysqli_query($connect,$query);
$no_of_row=mysqli_num_rows($result);

$temp_array=array();

if($no_of_row>0){
	while($row=mysqli_fetch_assoc($result)){
		$temp_array[]=$row;	
	}
	header('Content-Type: application/json');
	echo json_encode(array("attendance_data"=>$temp_array));
}
else{
	echo "Unsuccessfully";
}


mysqli_close($connect);
}
?>