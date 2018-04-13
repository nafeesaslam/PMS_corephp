<?php
$postdata = file_get_contents("php://input");

    $request = json_decode($postdata);

    $sdata0=$request->id;
    $sdata1=$request->achievementsCategory;
	$sdata2=$request->achievementsPostDate;
	$sdata3=$request->achievementsFinYear;
	$sdata4=$request->achievementsHalfYear;
	$sdata5=$request->achievementsRemarks;  
    


 /*$empEmail = $request->email;
    $empDesignation = $request->designation;*/

/*$sdata0=$_POST['id'];
$sdata1=$_POST['achievementsCategory'];
$sdata2=$_POST['achievementsPostDate'];
$sdata3=$_POST['achievementsFinYear'];
$sdata4=$_POST['achievementsHalfYear'];
$sdata5=$_POST['achievementsRemarks'];*/
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

$sql = "UPDATE  employees SET achievementsCategory='$sdata1', achievementsPostDate='$sdata2', achievementsFinYear='$sdata3', achievementsHalfYear='$sdata4', achievementsRemarks='$sdata5' WHERE id='$sdata0'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>