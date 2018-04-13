<?php
session_start();




$connect = mysqli_connect("localhost", "root", "", "epms"); 
$empno=$_SESSION['emp_no'];
//echo 'emp:'+$empno;  
 $postdata = json_decode(file_get_contents("php://input"));
 //$qry = "UPDATE tbl_trn_kpi_details SET self_rating=$val WHERE kpi_id=$kpiid and emp_no=$empno";
    
    
 $tot = count($postdata); 
 echo $tot;
 for($i=0;$i<$tot;$i++) {
 	$kpiid = $postdata[$i]->ID;
 	$val = $postdata[$i]->Rate;
 	$rem = $postdata[$i]->Rem;
 	
 	/*echo $kpiid;
 	echo $val;
 	echo $rem;*/
 	mysqli_query($connect,"UPDATE tbl_trn_kpi_details SET self_rating='".$val."',self_remarks='".$rem."' WHERE kpi_id=$kpiid and emp_no=$empno");
 }

 ?>