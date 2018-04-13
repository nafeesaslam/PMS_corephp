<?php
session_start();




$connect = mysqli_connect("localhost", "root", "", "epms"); 
$empno=$_SESSION['emp_no'];
//echo 'current_user:', $empno;
$postdata = json_decode(file_get_contents("php://input"));
$emp=$postdata->emp;
//echo 'emp_no:', $emp;

$qry = "SELECT `emp_appraiser1_emp_no`,`emp_appraiser2_emp_no`,`emp_reviewer_emp_no` FROM tbl_mstr_emp_details WHERE `emp_no`='$emp'";
$result	= mysqli_query($connect,$qry);
$rows = mysqli_num_rows($result);
$role=mysqli_fetch_assoc($result);
//echo json_encode($role);


 if ($role['emp_appraiser1_emp_no']==$empno)
 {
 	$connect = mysqli_connect("localhost", "root", "", "epms"); 

 	$postdata = json_decode(file_get_contents("php://input"));
 	$data=$postdata->data;
 	$tot = count($data);

 for($i=0;$i<$tot;$i++) {
 	
 	$data=$postdata->data;
 	$trn=$data[$i]->trn;
 	$rt=$data[$i]->Rate;
 	$rem=$data[$i]->Rem;
 	
 	/*echo $trn;
 	echo $rt;
 	echo $rem;*/
 	
 mysqli_query($connect,"UPDATE tbl_trn_kpi_details SET app1_rating='".$rt."', app1_remarks='".$rem."' WHERE trn_kpi_id='".$trn."'");
 }
echo 1;
}else if ($role['emp_appraiser2_emp_no']==$empno) {
 	$connect = mysqli_connect("localhost", "root", "", "epms"); 

 	$postdata = json_decode(file_get_contents("php://input"));
 	$data=$postdata->data;
 	$tot = count($data);

 for($i=0;$i<$tot;$i++) {
 	
 	$data=$postdata->data;
 	$trn=$data[$i]->trn;
 	$rt=$data[$i]->Rate;
 	$rem=$data[$i]->Rem;
 	
 	/*echo $trn;
 	echo $rt;
 	echo $rem;*/
 	
 mysqli_query($connect,"UPDATE tbl_trn_kpi_details SET app2_rating='".$rt."', app2_remarks='".$rem."' WHERE trn_kpi_id='".$trn."'");
 }
echo 2;
 }else if ($role['emp_reviewer_emp_no']==$empno) {
 	$connect = mysqli_connect("localhost", "root", "", "epms"); 

 	$postdata = json_decode(file_get_contents("php://input"));
 	$data=$postdata->data;
 	$tot = count($data);

 for($i=0;$i<$tot;$i++) {
 	
 	$data=$postdata->data;
 	$trn=$data[$i]->trn;
 	$rt=$data[$i]->Rate;
 	$rem=$data[$i]->Rem;
 	
 	/*echo $trn;
 	echo $rt;
 	echo $rem;*/
 	
 	mysqli_query($connect,"UPDATE tbl_trn_kpi_details SET reviewer_rating='".$rt."', reviewer_remarks='".$rem."' WHERE trn_kpi_id='".$trn."'");
 }
 echo 3;
 }else{
 	/*echo 'You are not authorized to Score';*/
 }
 
 ?>