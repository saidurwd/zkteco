<?php
    // set local date time zone
    date_default_timezone_set("Asia/Dhaka");
    require 'local_db.php';
    //$mydate = date('Ymd');
    //$sql  = "SELECT u.Badgenumber as ID, c.CHECKTIME as date_time FROM USERINFO u, CHECKINOUT c WHERE u.USERID = c.USERID";
    $sql = "SELECT U.Badgenumber AS 'employee_id', Format(C.CHECKTIME, 'dd-mm-yyyy') AS 'attendance_date', Min(Format(C.CHECKTIME, 'HH:mm')) AS 'clock_in', Max(Format(C.CHECKTIME, 'HH:mm')) AS 'clock_out'
            FROM USERINFO U INNER JOIN CHECKINOUT C ON U.USERID = C.USERID 
            GROUP BY Format(C.CHECKTIME, 'dd-mm-yyyy'), U.Badgenumber";
    $result = $db->query($sql);
    //print_r($result);
    $response = array();

    while ($row = $result->fetch()) {
        $response[] = $row;
    }
    echo json_encode($response);
