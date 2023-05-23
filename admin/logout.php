<?php
	session_start();

	require_once("connect_db.php");

	//*** Update Status
	$sql = "UPDATE staffinfo SET loginstatus = 0, session = '0000-00-00 00:00:00' WHERE staff_id = '".$_SESSION["staff_id"]."' ";
	$query = mysqli_query($con,$sql);

	session_destroy();
	header("location:login.php");
?>