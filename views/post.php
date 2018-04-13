<?php
// $postdata = file_get_contents("php://input");
//     $request = json_decode($postdata);
//     $kpi1= $request->kpi;
   /*$empEmail = $request->email;
    $empDesignation = $request->designation;*/
session_start();
$name=$_SESSION["user_name"];
$sdata1=$_POST['self_scale_kpi1'];
$sdata2=$_POST['self_scale_kpi2'];
$sdata3=$_POST['self_scale_kpi3'];
$sdata4=$_POST['self_remarks_kpi1'];
$sdata5=$_POST['self_remarks_kpi2'];
$sdata6=$_POST['self_remarks_kpi3'];
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

$sql = "UPDATE  employees SET self_scale_kpi1='$sdata1', self_scale_kpi2='$sdata2', self_scale_kpi3='$sdata3', self_remarks_kpi1='$sdata4', self_remarks_kpi2='$sdata5', self_remarks_kpi3='$sdata6' WHERE name='$name'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>