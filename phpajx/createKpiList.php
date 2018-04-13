<?php

 $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $kpiname = $request->name;
    $kpitype = $request->type;
    $kpidept = $request->dep;
    $kpistatus= $request->status;
    


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

$sql = "INSERT INTO tbl_mstr_kpi_details(Name,Type,Department,Status)
VALUES ('".$kpiname."', '".$kpitype."', '".$kpidept."', '".$kpistatus."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>