<?php
date_default_timezone_set("Asia/Dhaka");
require 'mysql_db.php';
//print_r($_REQUEST);
$data = $_REQUEST['data'];
$json = json_decode($data, true);
foreach($json as $val)
{
    $employee_id = $val['employee_id'];
    $attendance_date = $val['attendance_date'];
    $clock_in = $val['clock_in'];
    $clock_out = $val['clock_out'];
        
try {
  $sql = "INSERT INTO attendance (employee_id, attendance_date, clock_in, clock_out) VALUES ($employee_id, $attendance_date, $clock_in, $clock_out);";
  // use exec() because no results are returned
  $conn->exec($sql);
//   echo "New record created successfully";
    } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }

}


