<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include'connection_demo.php';
update();
}

function update(){
global $connect;

$e_id=$_POST["e_id"];
$gps_status=$_POST["gps_status"];
$update_flag=$_POST["update_flag"];
$current_lat=$_POST["current_lat"];
$current_lon=$_POST["current_lon"];

$query="UPDATE emp SET gps_status='$gps_status', update_flag='$update_flag', current_lat='$current_lat', current_long='$current_lon' WHERE e_id='$e_id';";

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