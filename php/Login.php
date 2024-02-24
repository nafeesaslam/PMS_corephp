<?php
if (!isset($_SESSION)) 
{
session_start();
}
include("dbconfig.php");
$error='';
if (isset($_POST["Submit"]))
{
if (empty($_POST["myusername"]) || empty($_POST["mypassword"]))
	{
	 $error = "Username or Password is invalid"; 
	 echo $error;
	} 
	else 
	{ 
	$username=$_POST["myusername"]; 
	$password=$_POST["mypassword"]; 
	$query= "select * from tbl_login where password='$password' AND user_name='$username'";
$result	= mysqli_query($conn,$query);
$rows = mysqli_num_rows($result);
$role=mysqli_fetch_assoc($result);
echo json_encode($role);
$_SESSION['emp_no']=$role['emp_no'];
if ($rows == 1 && $role['role']!='Manager')
{
header("location:../datefilter.php");
}
if($rows == 1 && $role['role']=='Manager')
{
print json_encode($role);
header("location:../datefilter.php");	
}
if($rows == 1 && $username=$_POST["myusername"]=='ADMIN'){
	echo 'SUCCESS';
}
else
{
$error = "Username or Password is invalid"; 
echo $error;
if($_SESSION['emp_no']=='')
{
header('location:Login.php');
} 
} 
mysqli_close($conn); 
} 
}
?>
<html>
<head>
<meta charset="utf-8"/>
	<title>Login</title>
 <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <link href="../css/Login.css" rel="stylesheet">

    <script type="text/javascript" src="../js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular-route.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
     <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../Angular/app.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

<script>

	$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});
	</script>
</head>
<body>
   <link rel=stylesheet href="app.min.df5e9cc9.css" type="text/css"> 
<link rel="stylesheet" type="text/css" href="animate.css">
	<div class="app layout-fixed-header bg-white usersession">
   	 <div class="full-height" style="background-color:#f2f2f2;overflow: hidden;"> 
   	 	<div class="center-wrapper">
   	 	 <div class="center-content">
   	 	  <div class="row no-margin">
<div class="col-md-6 col-md-offset-3 col-xs-12 ">
					
						<form id="login-form"  method="POST" action="" style="display: block;">   
							<div class="form-inputs col-xs-8 col-xs-offset-2">
								 <div class="text-center mb15"> 
   	 	  		 	<img src="fav.png" height="40" width="40" id="image1">
   	 	  		 	<h1 style="letter-spacing: 2px;font-size: 6rem;">ALIGN</h1>
   	 	  		 	 </div> 
   	 	  		 	   <input type="text" class="form-control input-lg" placeholder="Email Address / User Name" id="mypassword" name="myusername" required="required">
   	 	  		 	    <input type=password class="form-control input-lg" placeholder="Password" name="mypassword" id="mpassword" required="required" style="margin-top: 10px;"> 
   	 	  		 	</div> 
					<div class="col-xs-8 col-xs-offset-2">
   	 	  		 <button class="btn btn-success btn-block btn-lg mb15" id="login-submit" type="submit" 
   	 	  		 name="Submit" style="margin-top: 10px;"> <span>Sign me In</span></button></div> </form>
	 </div>
 	</div>
	</div>			
	</div>								
	</div>								
	</div>
	<script type="text/javascript">
   	 	  	  $('#image1').addClass('animated jackInTheBox');
   	 	  	  $('h1').addClass('animated jackInTheBox');
   	 	  	  $('#mypassword').addClass('animated bounceInRight');
   	 	  	   $('#mpassword').addClass('animated bounceInLeft');
   	 	  	  $('#login-submit').addClass('animated zoomIn');
   	 	  	</script>
	</body>
	</html>
