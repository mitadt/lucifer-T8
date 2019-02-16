<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
require 'connection_demo.php';
add();
}

function add(){
global $connect;

$e_id=$_POST["e_id"];
$task=$_POST["task"];
$assigned_date=$_POST["assigned_date"];


$query="INSERT INTO task(e_id,task,assigned_date) VALUES('$e_id','$task','$assigned_date');";

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

mysqli_close($connect);

}
?>