<?php
	include "setup.php";
	
	//SLEEP 5 MS
	usleep("5000");
	
	$id = (int) $_GET["id"];

	$sql_command = "UPDATE $sql_tbname SET status = 1 WHERE id = $id";
	$sql_query = mysqli_query($conn, $sql_command);

	if ($sql_query) {
		echo "ok";
	} else {
		echo $sql_query->error;
	}
?>