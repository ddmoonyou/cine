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
    if($_FILES['inputPosterImage']['size'] == 0 || $_FILES['inputPromoteImage']['size'] == 0
    ||    empty($_POST["name"]) || empty($_POST["length"])
    || empty($_POST["description"]) || empty($_POST["director"])
    || empty($_POST["start_promote"]) || empty($_POST["end_promote"]) || empty($_POST["branch_id"])
    || empty($_POST["theater"]) || empty($_POST["time"])
    || empty($_POST["audio"]) || empty($_POST["subtitle"]) || empty($_POST["release"])
    )
    {
        $_SESSION['status'] = 'Data is invalid!';
        $_SESSION['status_text'] = 'Please try again';
        $_SESSION['status_code'] = 'error';
        header('Location: new-movie.php');
        // echo "<script> alert('Data is invalid!'); window.location.href='new-movie.php'; </script>";
    }
    else
    {

        $s_date = $_POST["start_promote"];
        $e_date = $_POST["end_promote"];
        $start_date = date ('Y-m-d H:i:s', strtotime($s_date));
        $end_date = date ('Y-m-d H:i:s', strtotime($e_date));
        $premiere_time = $_POST["time"];
        $r_date =  mysqli_real_escape_string($con,$_POST["release"]);

        if($end_date < $start_date)
        {
            echo "<script> alert('End date must be after start date!'); window.location.href='new-movie.php'; </script>";
        } else if($premiere_time > $r_date)
        {
            echo "<script> alert('Premiere date must be before release date!'); window.location.href='new-movie.php'; </script>";
        } else{

            $name =  mysqli_real_escape_string($con,$_POST["name"]);
            $length =  $_POST["length"];
            $description =  mysqli_real_escape_string($con,$_POST["description"]);
            $movie_trailer = mysqli_real_escape_string($con,$_POST["movie_trailer"]);
            $director =  mysqli_real_escape_string($con,$_POST["director"]);
            $sp_date =  mysqli_real_escape_string($con,$_POST["start_promote"]);
            $np_date =  mysqli_real_escape_string($con,$_POST["end_promote"]);
            $r_date =  mysqli_real_escape_string($con,$_POST["release"]);
            $branch_id =  mysqli_real_escape_string($con,$_POST["branch_id"]);
            $theater =  mysqli_real_escape_string($con,$_POST["theater"]);
            $time = $_POST["time"];
            $audio =  mysqli_real_escape_string($con,$_POST["audio"]);
            $subtitle =  mysqli_real_escape_string($con,$_POST["subtitle"]);

            $start_promote = date ('Y-m-d H:i:s', strtotime($sp_date));
            $end_promote = date ('Y-m-d H:i:s', strtotime($np_date));
            $releaseDate = date ('Y-m-d H:i:s', strtotime($r_date));
            $sql ="INSERT INTO movieinfo(movie_name,movie_length,movie_description,director_info,start_promote,end_promote,releaseDate,movie_trailer)
                    VALUES ('$name',$length,'$description','$director','$start_promote','$end_promote','$releaseDate','$movie_trailer');";

            if (!mysqli_query($con, $sql)) {
		    	die('Error: ' . mysqli_error($con));
		    }
            $id = mysqli_insert_id($conn);

            $filename = $_FILES["inputPosterImage"]["name"];
            $path = "../../home/img/poster/".$id.".jpg";
            move_uploaded_file($_FILES['inputPosterImage']['tmp_name'],$path);

            $filename = $_FILES["inputPromoteImage"]["name"];
            $path = "../../home/img/promote/".$id.".jpg";
            move_uploaded_file($_FILES['inputPromoteImage']['tmp_name'],$path); 


            $mysqltime = date ('Y-m-d H:i:s', strtotime($time));
            $sql ="INSERT INTO showings(movie_id,branch_id,theater_no,date_time,language_dub,language_sub,premiere_ticket)
                    VALUES ($id,$branch_id,$theater,'$mysqltime','$audio','$subtitle',1);";

            if (!mysqli_query($con, $sql)) {
		    	die('Error: ' . mysqli_error($con));
		    }

            $_SESSION['status'] = 'Successful!';
            $_SESSION['status_text'] = 'Added new movie';
            $_SESSION['status_code'] = 'success';
            header('Location: new-movie.php');
            // echo "<script> alert('Add new movie successful!'); window.location.href='new-movie.php'; </script>";
        }

    }

?>