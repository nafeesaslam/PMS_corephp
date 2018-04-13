<?php

/* $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $empNo = $request->emp_no;*/
   //echo $empNo;
$empNo=$_GET["emp_no"];
$servername = "localhost";
$username = "root";
$password = ""; //Your User Password
$dbname = "epms"; //Your Database Name


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT trn_kpi_id, mskp.Name as KPI, emp_no, kpi_weightage, self_rating, self_remarks, app1_rating, app1_remarks, app1_post_date, app2_rating, app2_remarks, app2_post_date, reviewer_rating, reviewer_remarks, reviewer_post_date, Target, Actual, save_status, submit_status, financial_year, half_year FROM tbl_mstr_kpi_details as mskp, tbl_trn_kpi_details WHERE emp_no=$empNo and mskp.ID=kpi_id";

$result = $conn->query($sql);
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