<?php
session_start();
header('Content-Type: application/json');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'epms');
//get connection
$name=$_SESSION['user_name'];
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli)
{
die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("select kpi_masters.name,self_scale/weightage as was FROM kpi_masters,employees where employees.name='$name'");
//execute query
$result = $mysqli->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) 
{
$data[] = $row;
}
//free memory associated with result
$result->close();
print json_encode($data);
?>