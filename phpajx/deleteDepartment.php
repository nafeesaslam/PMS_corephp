<?php

 $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $id = $request->id;
    


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

$sql = "UPDATE tbl_mstr_department SET Status=0 WHERE ID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
