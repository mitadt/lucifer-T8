<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include'connection_demo.php';
retrieve();
}

function retrieve(){
global $connect;

$query="UPDATE emp SET update_flag='0' WHERE update_flag='1';";

	if (mysqli_query($connect,$query)) {
	 	echo 'Successfully';
	}
	else {
	 	echo 'Unsuccessfully'.mysqli_error($connect);
	}

mysqli_close($connect);
}
?>