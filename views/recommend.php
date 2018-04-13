<?php
$postdata = file_get_contents("php://input");

    $request = json_decode($postdata);

    $sdata0=$request->id;
    $sdata1=$request->recommendCategory;
	$sdata2=$request->recommendPostDate;
	$sdata3=$request->recommendFinYear;
	$sdata4=$request->recommendHalfYear;
	$sdata5=$request->recommendRemarks;  
    


 /*$empEmail = $request->email;
    $empDesignation = $request->designation;*/

/*$sdata0=$_POST['id'];
$sdata1=$_POST['recommendCategory'];
$sdata2=$_POST['recommendPostDate'];
$sdata3=$_POST['recommendFinYear'];
$sdata4=$_POST['recommendHalfYear'];
$sdata5=$_POST['recommendRemarks'];*/
//
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

$sql = "UPDATE  employees SET recommendCategory='$sdata1', recommendPostDate='$sdata2', recommendFinYear='$sdata3', recommendHalfYear='$sdata4', recommendRemarks='$sdata5' WHERE id='$sdata0'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>