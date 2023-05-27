<?php

	session_start();
	require_once("../connect_db.php");

	if(!isset($_SESSION['staff_id']))
	{
        header('Location: http://localhost/cine/admin/login.php');
		exit();
	}
	
	//*** Update Last Stay in Login System
	$sql = "UPDATE staffinfo SET session = NOW() WHERE staff_id = '".$_SESSION["staff_id"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM staffinfo WHERE staff_id = '".$_SESSION['staff_id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

    //empty($_POST["inputPosterImage"]) || empty($_POST["inputPromoteImage"]) || 
    
    if( !($_POST["pswd1"] == $_POST["pswd2"]))
    {
        echo "<script> alert('Password must match!'); window.location.href='new-staff.php'; </script>";
    }

    if( empty($_POST["firstname"]) || empty($_POST["lastname"])
    || empty($_POST["telephone"]) || empty($_POST["staff_role"])
    || empty($_POST["pswd1"]) || empty($_POST["branch_id"])
    )
    {
        echo "<script> alert('Data is invalid!'); window.location.href='new-staff.php'; </script>";
    }
    else
    {
        $firstname =  $_POST["firstname"];
        $lastname =  $_POST["lastname"];
        $telephone =  $_POST["telephone"];
        $branch_id = $_POST["branch_id"];
        $pswd =  mysqli_real_escape_string($con,$_POST["pswd1"]);
        $staff_role =  mysqli_real_escape_string($con,$_POST["staff_role"]);

        $sql ="INSERT INTO staffinfo(branch_id,staff_role,staff_first_name,staff_last_name,staff_tel,password)
                VALUES ('$branch_id','$staff_role','$firstname','$lastname','$telephone','$pswd');";
        
        if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

        echo "<script> alert('Add new staff succesful!'); window.location.href='new-staff.php'; </script>";
    } 
    


?>