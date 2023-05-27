<?php

	session_start();
	require_once("../connect_db.php");

	if(!isset($_SESSION['staff_id']))
	{
        header('Location: http://localhost/cine/admin/login.php');
		exit();
	}

    if(isset($_POST['submit'])) {
	
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
            $_SESSION['status'] = 'Password must match!';
            $_SESSION['status_code'] = 'warning';
            header('edit-staff.php');
            // echo "<script> alert('Password must match!'); window.location.href='edit-staff.php'; </script>";
        }


        if( empty($_POST["firstname"]) || empty($_POST["lastname"])|| empty($_POST["telephone"]))
        {
            $_SESSION['status'] = 'Data is invalid!';
            $_SESSION['status_code'] = 'error';
            header('edit-staff.php');
            // echo "<script> alert('Data is invalid!'); window.location.href='edit-staff.php'; </script>";
        }
        else
        {
            $firstname =  $_POST["firstname"];
            $lastname =  $_POST["lastname"];
            $telephone =  $_POST["telephone"];
            
            
            
            
            $sql =  "UPDATE staffinfo
                    SET staff_first_name= '$firstname', staff_last_name= '$lastname',staff_tel= '$telephone'
                    WHERE staff_id = '$_SESSION[staff_id]';";
            
            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error($con));
            }

            if(!empty($_POST["staff_role"]))
            {
                $staff_role =  mysqli_real_escape_string($con,$_POST["staff_role"]);
                $sql =  "UPDATE staffinfo
                        SET staff_role= '$staff_role'
                        WHERE staff_id = '$_SESSION[staff_id]';";
            
                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error($con));
                }
            }

            if(!empty($_POST["branch_id"]))
            {
                $branch_id = $_POST["branch_id"];
                $sql =  "UPDATE staffinfo
                        SET branch_id= '$branch_id'
                        WHERE staff_id = '$_SESSION[staff_id]';";
            
                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error($con));
                }
            }

            if(!empty($_POST["pswd1"]))
            {
                $pswd1 =  $_POST["pswd1"];
                $sql =  "UPDATE staffinfo
                        SET password= '$pswd1'
                        WHERE staff_id = '$_SESSION[staff_id]';";
            
                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error($con));
                }
            }
        

            $_SESSION['status'] = 'Successful!';
            $_SESSION['status_text'] = 'Edited staff information';
            $_SESSION['status_code'] = 'success';
            header('Location: edit-staff.php');

            // echo "<script> alert('Edited staff $_SESSION[staff_id] succesful!'); window.location.href='edit-staff.php'; </script>";
        } 

    }
    


?>

