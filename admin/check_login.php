<?php
	session_start();

	require_once("connect_db.php");
	
	$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);

	$strSQL = "SELECT * FROM staffinfo WHERE staff_id = '".$strUsername."' 
	and Password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "Username and Password Incorrect!";
		exit();
	}
	else
	{
		if($objResult["loginstatus"] == 1)
		{
			echo "'".$strUsername."' Exists login!";
			exit();
		}
		else
		{
			//*** Update Status Login
			$sql = "UPDATE staffinfo SET loginstatus = 1 , session = NOW() WHERE staff_id = '".$objResult["staff_id"]."' ";
			$query = mysqli_query($con,$sql);

			//*** Session
			$_SESSION["staff_id"] = $objResult["staff_id"];
			session_write_close();

			//*** Go to Main page
			header("location:index.php");
		}
			
	}
	mysqli_close($con);
?>