<?php
session_start();
header('Content-Type: application/json');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'epms');
//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli)
{
die("Connection failed: " . $mysqli->error);
}


$q = $_REQUEST['q'];
$dataray = [];

$query = sprintf("SELECT dept_name from tbl_mstr_department");

$suggestion = "";
if ($q !== "") {
	$q = strtolower($q);
	$len = strlen($q);
}

//execute query
foreach ($query as $row) {
	
	$dataray[] = $row;

if (stristr($q, substr($row,0,$len))) {
	if ($suggestion === "") {
		$suggestion= $row;
	}
	else
	{
		$suggestion .= ", $row";
	}
}
}
echo $suggestion === "" ? "NO suggestion" : $suggestion;
//free memory associated with result

?>