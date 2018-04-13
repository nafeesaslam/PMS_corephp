<?php

 $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $empNo = $request->empno;
   
     echo $empNo;


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

$sql = sprintf("SELECT kpi_weightage from   tbl_trn_kpi_details where emp_no = $empNo");

$result = mysqli_query($mysqli,$sql);
//loop through the returned data
$data =mysqli_fetch_assoc($result);
//free memory associated with result
$result->close();
print json_encode($data);