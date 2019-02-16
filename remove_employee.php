<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'connection_demo.php';
remove();
}

function remove(){
global $connect;

$e_id=$_POST["e_id"];

$query="DELETE FROM emp WHERE e_id='$e_id';";

$result=mysqli_query($connect,$query);
$no_of_row=mysqli_affected_rows($connect);

if($no_of_row>0){
echo "Successfully";	
}
if($no_of_row==0){
	echo "Unsuccessfully";
}

mysqli_close($connect);
}
?>