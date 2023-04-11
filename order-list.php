<?php
	include "setup.php";
	error_reporting(0);
	
	//SLEEP 5 MS
	usleep("5000");
	
	$currentId = 1;
	$outputTable = "<tr>";
	
	$sql_command = "SELECT * FROM $sql_tbname WHERE status = 0 ORDER BY id ASC LIMIT 0,$orderlist";
	$sql_query = mysqli_query($conn, $sql_command);

	while ( $sql_result = mysqli_fetch_array($sql_query) ) {
		$menu = $menuList[$sql_result["menu"]];
		
		if ($currentId == 1) {
			$outputTable .= '<td width="48%">
								<center>
									<button type="button" class="btn-bgv btn-bg' . $sql_result["menu"] . '" onclick="changeStatus(' . $sql_result["id"] . ')">
										<table border="0" width="100%" height="100%">
											<tr height="8%">
												<td></td>
											</tr>
											<tr height="82%">
												<th>
													<font size="7">
														<center>
															' . $sql_result["id"] . '
														</center>
													</font>
												</th>
											</tr>
											<tr height="10%">
												<td>
													<font size="4">
														<center>
															' . $menu . '
														</center>
													</font>
												</td>
											</tr>
										</table>
									</button>
								</center>
							</td>';
							
			$currentId = 2;
		} elseif ($currentId == 2) {
			$outputTable .= '<td width="4%"></td>
							<td width="48%">
								<center>
									<button type="button" class="btn-bgv btn-bg' . $sql_result["menu"] . '" onclick="changeStatus(' . $sql_result["id"] . ')">
										<table border="0" width="100%" height="100%">
											<tr height="8%">
												<td></td>
											</tr>
											<tr height="82%">
												<th>
													<font size="7">
														<center>
															' . $sql_result["id"] . '
														</center>
													</font>
												</th>
											</tr>
											<tr height="10%">
												<td>
													<font size="4">
														<center>
															' . $menu . '
														</center>
													</font>
												</td>
											</tr>
										</table>
									</button>
								</center>
							</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>';
							
			$currentId = 1;
		}
	}
	$outputTable .= '</tr>';
	
	echo $outputTable;
?>