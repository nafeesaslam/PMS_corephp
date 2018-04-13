<?php
session_start();




$connect = mysqli_connect("localhost", "root", "", "epms");
$empno=$_SESSION['emp_no'];
//echo 'emp:'+$empno;
  $postdata = json_decode(file_get_contents("php://input"));
  //$qry = "UPDATE tbl_trn_kpi_details SET self_rating=$val WHERE  kpi_id=$kpiid and emp_no=$empno";
  $emp_no=$postdata->emp;

  $data=$postdata->kpis;

  $tot = count($data);

//echo json_encode($postdata);
  for($i=0;$i<$tot;$i++) {
          $emp_no=$postdata->emp;
          $kpiid=$data[$i]->kpi_id;
          $weightage = $data[$i]->weight;
          $target = $data[$i]->target;



  mysqli_query($connect,"INSERT INTO tbl_trn_kpi_details (`emp_no`,  
`kpi_id`,`kpi_weightage`,`Target`)VALUES('".$emp_no."','".$kpiid."','".$weightage."','".$target."'')");
  }

  ?>