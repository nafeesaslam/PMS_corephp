<?php
 $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $empName = $request->emp_name;
    $empno = $request->emp_no;
    //$empEmail = $request->email;
    $empDesignation = $request->emp_designation;
    include('db.php');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "update tbl_mstr_emp_details set emp_name='$empName', emp_designation='$empDesignation' where emp_no='$empno'";
if ($conn->query($sql) === TRUE) 
{
    echo "New record created successfully";
} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>