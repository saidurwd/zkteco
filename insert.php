<?php
date_default_timezone_set("Asia/Dhaka");
require 'mysql_db.php';
$data = $_REQUEST['data'];
$data = json_encode($data);
$json = json_decode($data, true);
foreach($json as $val)
{
    $date = new DateTimeImmutable($val[1]);
    $employee_id = $val['0'];
    $attendance_date = $date->format('Y-m-d');
    $clock_in = $val['2'];
    $clock_out = $val['3'];
        
try {
  $sql = "INSERT INTO attendance (employee_id, attendance_date, clock_in, clock_out) VALUES ($employee_id, '$attendance_date', '$clock_in', '$clock_out');";
  // use exec() because no results are returned
  $conn->exec($sql);
//   echo "New record created successfully";
    } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }
}


