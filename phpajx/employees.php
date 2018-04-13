<?php
session_start();
header('Content-Type: application/json');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'epms');
$empno=$_SESSION['emp_no'];
//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli)
{
die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT user_id, emp_no, emp_name, emp_type, emp_sex, emp_dob, emp_doj, emp_designation,  emp_department, emp_no_of_appraisers, emp_appraiser1_name, emp_appraiser1_emp_no, emp_appraiser2_name, emp_appraiser2_emp_no, emp_reviewer_name, emp_reviewer_emp_no, emp_address, emp_mailid, emp_contact, emp_bld_grp, emp_nationality, emp_religion, emp_father,manager_name, emp_mstatus, emp_img, emp_status FROM tbl_mstr_emp_details WHERE emp_appraiser1_emp_no=$empno or emp_appraiser2_emp_no=$empno or emp_reviewer_emp_no=$empno");
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