<?php
session_start();
header('Content-Type: application/json');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'epms');
//get connection
$empno=$_SESSION['emp_no'];
$year=$_SESSION['year'];
$month=$_SESSION['month'];
$hyear=$_SESSION['half_year'];
echo $empno.$year.$month.$hyear;
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli)
{
die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT mstr.ID, mstr.Name,tp.type_name as Type, trn.self_rating as Rating, trn.self_remarks as Remarks
FROM tbl_trn_kpi_details as trn,tbl_mstr_kpi_type as tp,tbl_mstr_kpi_details as mstr WHERE mstr.ID=trn.kpi_id and tp.id=mstr.Type and trn.emp_no=$empno and financial_year=$year and half_year=$hyear");
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