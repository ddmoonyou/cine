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
 
    if($_FILES['snack_img']['name'] == '' ||empty($_POST["snack_name"])
    || empty($_POST["snack_description"]) || empty($_POST["snack_category"])
    || ( (empty($_POST["s_check"]) || empty($_POST["s"])) 
    &&   (empty($_POST["m_check"]) || empty($_POST["m"]))
    &&   (empty($_POST["l_check"]) || empty($_POST["l"])))
    )
    {
        $_SESSION['status'] = 'Data is invalid!';
        $_SESSION['status_text'] = 'Please try again';
        $_SESSION['status_code'] = 'error';
        header('Location: new-snackdrink.php');
        // echo "<script> alert('Data is invalid!'); window.location.href='new-snackdrink.php'; </script>";
    }
    else
    {
        $snack_name = mysqli_real_escape_string($con,$_POST["snack_name"]);
        $snack_description = mysqli_real_escape_string($con,$_POST["snack_description"]);
        $snack_category = mysqli_real_escape_string($con,$_POST["snack_category"]);
        
        $sql = "INSERT INTO foodinfo (food_type, category, description)
        VALUES ('$snack_name', '$snack_category', '$snack_category')";
        
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }   
        
        if(!empty($_POST["s_check"]))
        {
            $s = $_POST["s"];
            $sql1 = "INSERT INTO foodsize (food_type, size, price)
            VALUES ('$snack_name', 'S', $s)";
            if (!mysqli_query($con, $sql1)) {
                die('Error: ' . mysqli_error($con));
            }
        }

        if(!empty($_POST["m_check"]))
        {
            $m = $_POST["m"];
            $sql1 = "INSERT INTO foodsize (food_type, size, price)
            VALUES ('$snack_name', 'S', $m)";
            if (!mysqli_query($con, $sql1)) {
                die('Error: ' . mysqli_error($con));
            }
        }

        if(!empty($_POST["l_check"]))
        {
            $l = $_POST["l"];
            $sql1 = "INSERT INTO foodsize (food_type, size, price)
            VALUES ('$snack_name', 'S', $l)";
            if (!mysqli_query($con, $sql1)) {
                die('Error: ' . mysqli_error($con));
            }
        }

        $filename = $_FILES["snack_img"]["name"];
        $path = "../../home/img/snack/".$snack_name.".png";
        move_uploaded_file($_FILES['snack_img']['tmp_name'],$path);
        
        $_SESSION['status'] = 'Successful';
        $_SESSION['status_text'] = 'Added new snack&drink';
        $_SESSION['status_code'] = 'success';
        header('Location: new-snackdrink.php');
        // echo "<script> alert('Add new snack or drink succesful!'); window.location.href='new-snackdrink.php'; </script>";
    } 
?>