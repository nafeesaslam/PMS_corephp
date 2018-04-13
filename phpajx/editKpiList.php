<?php

 $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $id = $request->id;
    $kpiname = $request->name;
    $kpitype = $request->type;
    $kpidept = $request->department;
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

$sql = "UPDATE tbl_mstr_kpi_details SET Name='$kpiname', Type='$kpitype', Department='$kpidept', Status='$kpistatus' WHERE ID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>