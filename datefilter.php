<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body style="background-color:#f2f2f2;">

<?php
if(isset($_POST["getData"])){
$_SESSION["year"] = $_POST["year"];
$_SESSION["month"] = $_POST["month"];
$_SESSION["half_year"] = $_POST["half_year"];
$_SESSION["q_year"] = $_POST["q_year"];
echo "Session variables are set.".$_SESSION["year"] . ' ' . $_SESSION["half_year"] . ' ' . $_POST["month"].' '.$_POST["q_year"];
header('location: index.php');
}
// Set session variables

?>
<div class="container" style="margin-top: 10%;">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-danger" style="box-shadow: 5px 5px 25px black;"><div class="panel-heading">DATA FILTER</div><div class="panel-body"><form name="date-is" action="" method="post">

	<select class="form-control" name="year" style="width: 50% !important;float: left;">
		<option value="">Select Year</option>
		<option value="2017">2017</option>
		<option value="2016">2016</option>
		<option value="2015">2015</option>
	</select>
	<select class="form-control" name="month" style="width: 50% !important;float: left;">
		<option value="">Select Month</option>
		<option value="January">January</option>
    	<option value="February">February</option>
    	<option value="March">March</option>
    	<option value="April">April</option>
    	<option value="May">May</option>
    	<option value="June">June</option>
    	<option value="July">July</option>
    	<option value="August">August</option>
    	<option value="September">September</option>
    	<option value="October">October</option>
    	<option value="November">November</option>
    	<option value="December">December</option>
	</select>
	<select class="form-control" name="half_year" style="width: 50% !important;float: left;">
		<option value="">Select Half Year</option>
		<option value="H1">H1</option>
		<option value="H2">H2</option>
	</select>
	<select class="form-control" name="q_year" style="width: 50% !important;float: left;">
		<option value="">Select Quarter Year</option>
		<option value="Q1">Q1</option>
		<option value="Q2">Q2</option>
		<option value="Q3">Q3</option>
		<option value="Q4">Q4</option>
	</select>
	<input class="btn btn-primary btn-sm" type="submit" name="getData" value="Submit" style="margin-top: 10px;">
</form></div><div class="panel-footer">You can choose any combination(Y:m, Y:h, Y:q)</div></div>

	</div>
</div>
<link href="/EPMSxs/boot/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="/EPMSxs/boot/js/bootstrap.min.js"></script>
<style type="text/css">
	.form-control{
		margin-top: 5px;
		border-radius: 0px !important;
	}
</style>
</body>
</html>