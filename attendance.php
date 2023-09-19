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
				<th>employee_id</th>
				<th>attendance_date</th>
				<th>clock_in</th>
				<th>clock_out</th>
			</tr>
		</thead>
		<thead>
			<?php
			date_default_timezone_set("Asia/Dhaka");
			require 'local_db.php';
			$sql_data  = "SELECT U.`Badgenumber` AS employee_id, FORMAT(C.CHECKTIME,'yyyyMMdd') AS attendance_date, MIN(FORMAT(C.`CHECKTIME`,'HH:mm')) AS clock_in, MAX(FORMAT(C.`CHECKTIME`,'HH:mm')) AS clock_out
			FROM CHECKINOUT  C
			LEFT JOIN USERINFO U ON U.USERID=C.USERID
			GROUP BY FORMAT(C.CHECKTIME,'yyyyMMdd'), U.`Badgenumber`";

			$result_data = $db->query($sql_data);

			$i = 1;
			while ($row_data = $result_data->fetch()) {
			?>
				<tr>
					<td><?=$i++?></td>
					<td><?=$row_data["employee_id"]?></td>
					<td><?=$row_data["attendance_date"]?></td>
					<td><?=$row_data["clock_in"]?></td>
					<td><?=$row_data["clock_out"]?></td>
				</tr>
			<?php
			}
			?>
		</thead>
	</table>




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
			// require 'local_db.php';
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