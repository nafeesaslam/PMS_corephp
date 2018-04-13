<?php
session_start();
header('Content-Type: application/json');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'epms');
//get connection
$empno=$_SESSION['emp_no'];
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli)
{
die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT emp_no, kpi_weightage, self_rating, self_remarks, app1_rating, app1_remarks, app2_rating, app2_remarks, reviewer_rating, reviewer_remarks, save_status, submit_status, appraisal_period,half_year, inserted_date FROM tbl_trn_kpi_details WHERE emp_no='$empno'");
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