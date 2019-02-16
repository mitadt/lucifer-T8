<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
require 'connection_demo.php';
add();
}

function add(){
global $connect;

$e_id=$_POST["e_id"];
$check_in=$_POST["check_in"];


$query1="SELECT * FROM attendance_info WHERE e_id='$e_id' AND  SUBSTR(check_in ,1,10) = SUBSTR('$check_in',1,10);";

	$result1=mysqli_query($connect,$query1);
	$no_of_row1=mysqli_num_rows($result1);

if($no_of_row1>0){
	echo "Already Check In";
}

if($no_of_row1==0){
	$query="INSERT INTO attendance_info(e_id,check_in) VALUES('$e_id','$check_in');";

		$result=mysqli_query($connect,$query);
		$no_of_row=mysqli_affected_rows($connect);

		if($no_of_row>0){
			echo "Successfully";	
		}
		if($no_of_row==0){
			echo "Unsuccessfully";
		}
		else{
			echo "".mysqli_error($connect);
		}

}

mysqli_close($connect);

}
?>