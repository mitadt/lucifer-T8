<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
require 'connection_demo.php';
add();
}

function add(){
global $connect;

$name=$_POST["name"];
$email=$_POST["email"];
$mobile=$_POST["mobile"];
$username=$_POST["username"];
$password=$_POST["password"];
$sal=$_POST["sal"];
$lat=$_POST["lat"];
$lon=$_POST["lon"];


$query1="SELECT * FROM emp WHERE username='$username';";

$result1=mysqli_query($connect,$query1);
$no_of_row1=mysqli_num_rows($result1);


if($no_of_row1>0){

	echo "Employee already exist";

}

if($no_of_row1==0){

		$query="INSERT INTO emp(name,email_id,mobile_no,username,password,salary,latitude,longitude) VALUES('$name','$email','$mobile','$username','$password','$sal','$lat','$lon');";

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