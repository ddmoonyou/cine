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
    if($_FILES['branch_img']['name'] == ''
    ||   empty($_POST["promotion_code"]) || empty($_POST["discount_percent"])
    || empty($_POST["description_promotion"]) || empty($_POST["seat_type"])
    || empty($_POST["system_type"]) || empty($_POST["s_date"])
    || empty($_POST["e_date"]) 
    )
    {
        echo "<script> alert('Data is invalid!'); window.location.href='new-promotion.php'; </script>";
    }
    else
    {
        $promotion_code = mysqli_real_escape_string($con,$_POST["promotion_code"]);
        $discount_percent = $_POST["discount_percent"];
        $description_promotion = mysqli_real_escape_string($con,$_POST["description_promotion"]);
        $seat_type = mysqli_real_escape_string($con,$_POST["seat_type"]);
        $system_type = mysqli_real_escape_string($con,$_POST["system_type"]);
        $s_date = $_POST["s_date"];
        $e_date = $_POST["e_date"];
        $start_date = date ('Y-m-d H:i:s', strtotime($s_date));
        $end_date = date ('Y-m-d H:i:s', strtotime($e_date));

        if(strcmp($seat_type,"none")==0 && strcmp($system_type,"none")==0)
        {
            $sql ="INSERT INTO promotion(promotion_code,discount_percent,description,start_date,end_date)
                VALUES ('$promotion_code',$discount_percent,'$description_promotion','$start_date','$end_date');";

        }
        else if(strcmp($seat_type,"none")!=0 && strcmp($system_type,"none")==0)
        {
            $sql ="INSERT INTO promotion(promotion_code,discount_percent,description,start_date,end_date,seat_type)
            VALUES ('$promotion_code',$discount_percent,'$description_promotion','$start_date','$end_date','$seat_type');";
        }
        else if(strcmp($seat_type,"none")==0 && strcmp($system_type,"none")!=0)
        {
            $sql ="INSERT INTO promotion(promotion_code,discount_percent,description,start_date,end_date,system_type)
            VALUES ('$promotion_code',$discount_percent,'$description_promotion','$start_date','$end_date','$system_type');";
        }
        else if(strcmp($seat_type,"none")!=0 && strcmp($system_type,"none")!=0)
        {
            $sql ="INSERT INTO promotion(promotion_code,discount_percent,description,start_date,end_date,seat_type,system_type)
            VALUES ('$promotion_code',$discount_percent,'$description_promotion','$start_date','$end_date','$seat_type','$system_type');";
        }
        
        if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}
        $filename = $_FILES["promotion_img"]["name"];
        $path = "../../home/img/blog/".$promotion_code.".jpg";
        move_uploaded_file($_FILES['promotion_img']['tmp_name'],$path);

        echo "<script> alert('Add new promotion succesful!'); window.location.href='new-promotion.php'; </script>";
    } 
?>