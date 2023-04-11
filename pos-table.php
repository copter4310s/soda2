<?php
	include "setup.php";
	error_reporting(0);
	
	//SLEEP 5 MS
	usleep("5000");
	
	$sql_command = "SELECT * FROM $sql_tbname ORDER BY id DESC LIMIT 0,50";
	$sql_query = mysqli_query($conn, $sql_command);
	$outputTable = '<table width="100%" height="100%" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>
												#
											</th>
											<th>
												เวลา
											</th>
											<th>
												เมนู
											</th>
											<th>
												จ่ายผ่าน
											</th>
										</tr>
									</thead>
									<tbody>';
	
	while ( $sql_result = mysqli_fetch_array($sql_query) ) {
		$payMethod = array("เงินสด", "โอนจ่าย");
		$menu = $menuList[$sql_result["menu"]];
		
		$outputTable .= "				<tr>
											<td>
												" . $sql_result["id"] . "
											</td>
											<td>
												" . $sql_result["time"] . "
											</td>
											<td>
												" . $menu . "
											</td>
											<td>
												" . $payMethod[$sql_result["pay"]] . "
											</td>
										</tr>";
	}
	$outputTable .= "</tbody></table>";
	
	echo $outputTable;
?>