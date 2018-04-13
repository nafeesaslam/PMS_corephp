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
if(isset($_POST['updateemp']))
{
$empno=$_POST["empno"];
$empname=$_POST['empname'];
$empsex=$_POST['empsex'];
$empdob=$_POST['empdob'];
$empdoj=$_POST['empdoj'];
$empdesignation=$_POST['empdesignation'];
$emplocation=$_POST['emplocation'];
$empdpt=$_POST['empdpt'];
$empaddrs=$_POST['empaddrs'];
$empmail=$_POST['empmail'];
$empcntct=$_POST['empcntct'];
$empbldgrp=$_POST['empbldgrp'];
$empnation=$_POST['empnation'];
$empreligion=$_POST['empreligion']; 
$empfather=$_POST['empfather'];
$empmstts=$_POST['empmstts'];
$empstatus=$_POST['empstatus'];
//query to get data from the table
$query = ("UPDATE tbl_mstr_emp_details SET emp_name=$empname,emp_sex=$empsex,emp_dob=$empdoj,emp_doj=$empdoj,emp_designation=$empdesignation,emp_location=$emplocation,
	emp_department=$empdpt,emp_address=$empaddrs,emp_mailid=$empmail,emp_contact=$empcntct,emp_bld_grp=$empbldgr,emp_nationality=$empnation,emp_religion=$empreligion,emp_father=$empfather,emp_mstatus=$empmstts WHERE emp_no='$empno'");
//execute query
$result = $mysqli->query($query);
}
?>