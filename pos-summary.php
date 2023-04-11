<?php
	include "setup.php";
	
	//SLEEP 5 MS
	usleep("5000");
	
	$sql_command3 = "SELECT COUNT(id) AS sellCount FROM $sql_tbname";
	$sql_query3 = mysqli_query($conn, $sql_command3);
	$sellCounts = mysqli_fetch_array($sql_query3);
	
	$sellCount = (int) $sellCounts["sellCount"];
	$priceTotal = $sellCount * $defaultPrice;
	
	$qTotal = json_encode( array("sell"=>$sellCount, "price"=>$priceTotal) );
	echo $qTotal;
?>