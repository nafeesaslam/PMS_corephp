<?php
$postdata = file_get_contents("php://input");

    $request = json_decode($postdata);

    $sdata0=$request->id;
    $sdata1=$request->gapsCategory;
	$sdata2=$request->gapsPostDate;
	$sdata3=$request->gapsFinYear;
	$sdata4=$request->gapsMonth;
	$sdata5=$request->gapsRemarks;  
    


 /*$empEmail = $request->email;
    $empDesignation = $request->designation;*/

/*$sdata0=$_POST['id'];
$sdata1=$_POST['gapsCategory'];
$sdata2=$_POST['gapsPostDate'];
$sdata3=$_POST['gapsFinYear'];
$sdata4=$_POST['gapsHalfYear'];
$sdata5=$_POST['gapsRemarks'];*/
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

$sql = "UPDATE  employees SET gapsCategory='$sdata1', gapsPostDate='$sdata2', gapsFinYear='$sdata3', gapsMonth='$sdata4', gapsRemarks='$sdata5' WHERE id='$sdata0'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>