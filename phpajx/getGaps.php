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
$result = mysqli_query($mysqli,"SELECT empms.emp_name as Appraiser,agkp.financial_year,agkp.month,agkp.posted_date,agkp.Remarks  FROM tbl_mstr_emp_details as empms, tbl_trn_agr_details as agkp WHERE empms.emp_no=app_no and agkp.emp_no=$empno and agr_type=1");
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