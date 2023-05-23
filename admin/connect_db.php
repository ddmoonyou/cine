<?php
	
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName	  = "localhost";
	$userName	  = "root";
	$userPassword	  = "";
	$dbName	  = "cine";

	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}

	//*** Reject user not online
	$intRejectTime = 5; // Minute
	$sql = "UPDATE staffinfo SET loginstatus = 0, session = '0000-00-00 00:00:00'  WHERE 1 AND DATE_ADD(session, INTERVAL $intRejectTime MINUTE) <= NOW() ";
	$query = mysqli_query($con,$sql);

?>