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
    





    if( empty($_POST["movie_id"]) || empty($_POST["branch_id"])
    || empty($_POST["theater_no"]) || empty($_POST["time"])
    || empty($_POST["audio"]) || empty($_POST["subtitle"])
    )
    {
        echo "<script> alert('Data is invalid!'); window.location.href='new-showing.php'; </script>";
    }
    else
    {
        $movie_id =  $_POST["movie_id"];
        $branch_id =  $_POST["branch_id"];
        $theater_no =  $_POST["theater_no"];
        $time =  $_POST["time"];
        $audio =  $_POST["audio"];
        $subtitle =  $_POST["subtitle"];    
        
        $mysqltime = date ('Y-m-d H:i:s', strtotime($time));
        $sql ="INSERT INTO showings(movie_id,branch_id,theater_no,date_time,language_dub,language_sub)
                VALUES ($movie_id,$branch_id,$theater_no,'$mysqltime','$audio','$subtitle');";
        
        if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

        echo "<script> alert('Add new showing succesful!'); window.location.href='new-showing.php'; </script>";
    } 
    


?>