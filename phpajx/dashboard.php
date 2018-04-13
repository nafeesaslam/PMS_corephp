<?php
//setting header to json
session_start();
header('Content-Type: application/json');
//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'epms');
$empno=$_SESSION['emp_no'];
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli)
{
	die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = "call sp_dashboard('$empno')";
//execute query
$result = mysqli_query($mysqli,$query);
//loop through the returned data
$data =mysqli_fetch_assoc($result);
//free memory associated with result
$result->close();
print json_encode($data);