<?php
$db_username = ''; //username
$db_password = ''; //password

//path to database file
$database_path = realpath("attBackup.mdb");
//$database_path = realpath("C:/Program Files (x86)/ZKTeco/att2000.mdb");
//check file exist before we proceed
if (!file_exists($database_path)) {
	die("Access database file not found !");
}

//create a new PDO object
//$db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=realpath($database_path); Uid=$db_username; Pwd=$db_password;");

//$db = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=" . $database_path . ";Uid=; Pwd=;");

//$db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$database_path; Uid=$db_username; Pwd=$db_password;");

//echo $database_path;

try {
	return $db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$database_path; Uid=; Pwd=;");
} catch (PDOException $db) {
	return $db = 'Connection failed: ' . $db->getMessage();
}
