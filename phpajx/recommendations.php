<?php
session_start();
header('Content-Type: application/json');
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
$agr = "call sp_recommendations('$empno')";
$agrresult = mysqli_query($mysqli,$agr);
//loop through the returned data
// $fetch['empdetails']=mysqli_fetch_assoc($empresult);
// $rows = array();
// while($row1 = mysqli_fetch_assoc($kpiresult)) 
// {
// $rows['kpidetails'][] = $row1;
// }
//free memory associated with result
$data1 = array();
while ($agrlop=mysqli_fetch_assoc($agrresult)) 
{
$data1[] = $agrlop;	# code...
}
// $data2 = array();
// foreach ($kpiresult as $row) 
// {
// $data2[] = $row;
// }
// echo json_encode($fetch);
print json_encode($data1);
