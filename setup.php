<?php
	date_default_timezone_set('Asia/Bangkok');
    $sql_servername = "localhost";
    $sql_username = "1096969";
    $sql_password = "Minecraft123";
    $sql_dbname = "1096969";
	$sql_tbname = "soda2";
	$defaultPrice = 20;
	$orderlist = 30;
	$menuList = array(1=>"บลูฮาวาย", 2=>"แอปเปิ้ลเขียว", 3=>"กีวี่", 4=>"สตรอเบอร์รี่", 5=>"ลิ้นจี่", 6=>"บลูเลม่อน", 7=>"น้ำแดง", 8=>"บ๊วยเปรี้ยว", 9=>"บลูเบอร์รี่");
	
	$conn = new mysqli($sql_servername, $sql_username, $sql_password, $sql_dbname);
	
	if ($conn->connect_error) {
		echo "Couldn't connect to database.";
	}
?>