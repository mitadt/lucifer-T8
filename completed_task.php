<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include'connection_demo.php';
update();
}

function update(){
global $connect;

$t_id=$_POST["t_id"];
$completed_date=$_POST["completed_date"];
$duration=$_POST["duration"];

$query="UPDATE task SET completed_date='$completed_date', duration='$duration' WHERE t_id='$t_id';";

if (mysqli_query($connect,$query)) {
 	echo 'Successfully';
}
else {
 	echo 'Unsuccessfully'.mysqli_error($connect);
}
//.mysqli_error($connect)

mysqli_close($connect);
}
?>