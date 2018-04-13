<?php

 $postdata = file_get_contents("php://input");

    $request = json_decode($postdata);
    $empno = $request->empno;
    $empname = $request->name;
    //$emppass = $request->password;
    $dob = $request->dob;
    $email = $request->email;
    $contact = $request->contact;
    $bld = $request->bld;
    // $rel = $request->rel;
    $nation = $request->nation;
    $father = $request->father;
    $mStatus = $request->mStatus;
    $gender = $request->gender;
    $jdate = $request->jdate;
    $emptype = $request->emptype;
    $desig = $request->desig;
    $dep = $request->dep;
    $noapp = $request->noapp;
    $rman = $request->rman;
    $app1name = $request->app1name;
    $app1no = $request->app1no;
    $app2name = $request->app2name;
    $app2no = $request->app2no;
    $rev = $request->rev;
    $revno = $request->revno;
    $perm = $request->perm;
    $img = $request->img;


    


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

$sql = "INSERT INTO tbl_mstr_emp_details(
emp_no,
emp_name, 
emp_type, 
emp_sex, 
emp_dob, 
emp_doj, 
emp_designation,
emp_department, 
emp_no_of_appraisers, 
emp_appraiser1_name, 
emp_appraiser1_emp_no, 
emp_appraiser2_name, 
emp_appraiser2_emp_no, 
emp_reviewer_name, 
emp_reviewer_emp_no, 
manager_name, /*emp_address,*/ 
emp_mailid, 
emp_contact, 
emp_bld_grp, 
emp_nationality, 
-- emp_religion, 
emp_father,
emp_mstatus, 
emp_img,
permission)
VALUES (
'".$empno."', 
'".$empname."', 
'".$emptype."',
'".$gender."', 
'".$dob."', 
'".$jdate."',
'".$desig."', 
'".$dep."', 
'".$noapp."',
'".$app1name."', 
'".$app1no."', 
'".$app2name."',
'".$app2no."', 
'".$rev."', 
'".$revno."',
'".$rman."',
'".$email."',
'".$contact."', 
'".$bld."', 
'".$nation."',
'".$father."', 
'".$mStatus."',
'".$img."', 
'".$perm."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>