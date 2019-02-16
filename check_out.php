<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include'connection_demo.php';
update();
}

function update(){
global $connect;

$a_id=$_POST["a_id"];
$check_out=$_POST["check_out"];
$time_diff=$_POST["time_diff"];


$query1="SELECT * FROM attendance_info WHERE a_id='$a_id' AND  SUBSTR(check_out ,1,10) = SUBSTR('$check_out',1,10);";

	$result1=mysqli_query($connect,$query1);
	$no_of_row1=mysqli_num_rows($result1);

if($no_of_row1>0){
	echo "Already Check Out";
}

if($no_of_row1==0){

	$query="UPDATE attendance_info SET check_out='$check_out', time_diff='$time_diff' WHERE a_id='$a_id';";

	if (mysqli_query($connect,$query)) {
	 	echo 'Successfully';
	}
	else {
	 	echo 'Unsuccessfully'.mysqli_error($connect);
	}
}

mysqli_close($connect);
}
?>