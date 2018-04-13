<?php
session_start();




$connect = mysqli_connect("localhost", "root", "", "epms"); 
$empno=$_SESSION['emp_no'];
//echo 'emp:'+$empno;  
 $postdata = json_decode(file_get_contents("php://input"));
 //$qry = "UPDATE tbl_trn_kpi_details SET self_rating=$val WHERE kpi_id=$kpiid and emp_no=$empno";
 $emp_no=$postdata->emp;
 $type=$postdata->type;
 $data=$postdata->dat; 
    
 $tot = count($data);

//echo json_encode($postdata);
 for($i=0;$i<$tot;$i++) {
 	$emp_no=$postdata->emp;
 	$type=$postdata->type;
 	$data=$postdata->dat;
 	$finyr=$data[$i]->year;
 	$mnth=$data[$i]->mnth;
 	$rem=$data[$i]->feedback;
 	

 mysqli_query($connect,"INSERT INTO tbl_trn_agr_details (`emp_no`, `app_no`, `financial_year`, `month`, `agr_type`, `Remarks`)VALUES('".$emp_no."','".$empno."','".$finyr."','".$mnth."','".$type."','".$rem."')");
 }
echo 'Successfully Saved Feedbacks !';
 ?>