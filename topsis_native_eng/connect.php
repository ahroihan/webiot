<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    date_default_timezone_set('America/Los_Angeles');
    ini_set('max_execution_time', 0);
    session_start();
    
    $host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "topsis";
	$port   = 3306;

	global $connection,$title,$project;
	$connection = mysqli_connect($host, $user, $pass, $db, $port);
	if (!$connection) {
		echo "Database Not Connected";
	}
	$title = 'TOPSIS';
	$project = 'student'; /*for label and data of project*/
?>