<?php
	include "setup.php";
	
	//SLEEP 5 MS
	usleep("5000");
	
	$order = json_decode($_GET["order"], true);
	$menu = (int) $order["menu"];
	$pay = (int) $order["pay"];

	$time = date("H:i", time());
	
	$sql_command = "INSERT INTO $sql_tbname(time, menu, pay, status) VALUES ('$time', $menu, $pay, 0)";
	$sql_query = mysqli_query($conn, $sql_command);

	if ($sql_query) {
		echo "ok";
	} else {
		echo $sql_query->error;
	}
?>