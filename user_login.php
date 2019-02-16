<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include'connection_demo.php';
login();
}

function login(){
global $connect;

$username=$_POST["username"];
$password=$_POST["password"];

$query="SELECT * FROM emp WHERE username='$username' AND password='$password';";

$result=mysqli_query($connect,$query);
$no_of_row=mysqli_num_rows($result);

$temp_array=array();

if($no_of_row>0){

	while($row=mysqli_fetch_assoc($result)){
	$temp_array[]=$row;	
	}
	header('Content-Type: application/json');
	echo json_encode(array("users"=>$temp_array));

}
if($no_of_row==0){
	echo "Unsuccessfully";
}

mysqli_close($connect);
}
?>