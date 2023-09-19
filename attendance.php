<!DOCTYPE html>
<html>

<head>
	<title>Access Database </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<table>
		<thead>
			<tr>
				<th>SL</th>
				<th>User ID</th>
				<th>Staff ID</th>
				<th>Name</th>
				<th>Date</th>
				<th>Time</th>
				<th>Time-2</th>
				<th>DateTIME</th>
				<th>Delete
					<button type="button"><a href="all_delete.php">All</a></button>
				</th>
			</tr>
		</thead>
		<thead>
			<?php
			date_default_timezone_set("Asia/Dhaka");
			require 'local_db.php';
			//$mydate = date('Ymd');

			// $sql = "SELECT * FROM USERINFO";   // table inside .mdb file
			// $result = $db->query($sql);
			// $row = $result->fetch();
			// echo "<pre>";
			// print_r($row);
			// echo "</pre>";


			//echo $mydate;
			$sql  = "SELECT u.`USERID` AS MACHINID, u.`Badgenumber` AS USERID, u.`SSN` AS STAFFID, u.`Name`, c.`CHECKTIME`, FORMAT(c.`CHECKTIME`,'HH:mm') AS clock_in FROM USERINFO u, CHECKINOUT  c  WHERE u.USERID = c.USERID AND  FORMAT(c.CHECKTIME,'yyyyMMdd') ORDER BY c.CHECKTIME DESC";

			$result = $db->query($sql);
			//echo $result;
			//print_r($result->fetch());

			$index = 1;
			while ($row = $result->fetch()) {
			?>
				<tr>
					<td><?php echo $index++; ?></td>
					<td><?php echo $row["USERID"]; ?></td>
					<td><?php echo $row["STAFFID"]; ?></td>
					<td><?php echo $row["Name"]; ?></td>
					<td><?php echo date('Y-m-d', strtotime($row["CHECKTIME"])); ?></td>
					<td><?php echo date('h:i:s A', strtotime($row["CHECKTIME"])); ?></td>
					<td><?php echo $row["clock_in"]; ?></td>
					<td><?php echo $row["CHECKTIME"]; ?></td>
					<td>
						<button><a href="delete.php?id=<?php echo $row["MACHINID"]; ?>">Delete</a></button>
					</td>
				</tr>
			<?php
			}
			?>
		</thead>
	</table>
</body>

</html>