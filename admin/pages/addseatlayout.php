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
    if( empty($_POST["type_name"]) || empty($_POST["columns"]) || empty($_POST["seat_type"]))
    {
        $_SESSION['status'] = 'Data is invalid!';
        $_SESSION['status_text'] = 'Please try again';
        $_SESSION['status_code'] = 'error';
        header('Location: new-seatlayout.php');
        // echo "<script> alert('Data is invalid!'); window.location.href='new-seatlayout.php'; </script>";
    }
    else
    {
        $row = 'A';
        $type_name = mysqli_real_escape_string($con,$_POST["type_name"]);
        $columns = mysqli_real_escape_string($con,$_POST["columns"]);

        $sql = "INSERT INTO layouttype(layout_type)
                VALUE ('$type_name');";

        if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

        foreach($_POST["seat_type"] as $type)
        {
            
            for($i=1;$i<=$columns;$i++)
            {
                $sql = "INSERT INTO seatlayout(seat_type,layout_type,seat_row,seat_column)
                VALUE ('$type','$type_name','$row',$i);";

                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error($con));
                }
            }

            $row++;
        }

        $_SESSION['status'] = 'Successful!';
        $_SESSION['status_text'] = 'Added new seat layout';
        $_SESSION['status_code'] = 'success';
        header('Location: new-seatlayout.php');
        // echo "<script> alert('Add new seat layout succesful!'); window.location.href='new-seatlayout.php'; </script>";
    } 
?>