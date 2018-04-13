<?php
session_start();
header('Content-Type: application/json');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'epms');
//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli)
{
die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT designation_id, designation_name,status from tbl_mstr_designation WHERE Status=1");
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