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

    $movie_id = $_POST["movie_id"];

    if(!empty($_POST["movie_name"]))
    {
      $movie_name = mysqli_real_escape_string($con,$_POST["movie_name"]);
        $sql = "UPDATE movieinfo SET movie_name = '$movie_name' WHERE movie_id =  $movie_id"; 
        if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

        
    }
    if(!empty($_POST["movie_description"]))
    {
      $movie_description = mysqli_real_escape_string($con,$_POST["movie_description"]);
        $sql = "UPDATE movieinfo SET movie_description = '$movie_description' WHERE movie_id =  $movie_id"; 
         if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

    }
    if(!empty($_POST["movie_trailer"]))
    {
      $movie_trailer = mysqli_real_escape_string($con,$_POST["movie_trailer"]);
      $sql = "UPDATE movieinfo SET movie_trailer = '$movie_trailer' WHERE movie_id =  $movie_id"; 
      if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

    }
    if(!empty($_POST["director_info"]))
    {
      $director_info = mysqli_real_escape_string($con,$_POST["director_info"]);
      $sql = "UPDATE movieinfo SET director_info = '$director_info' WHERE movie_id =  $movie_id"; 
      if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

    }
    if(!empty($_POST["movie_length"]))
    {
      $movie_length = $_POST["movie_length"];
      $sql = "UPDATE movieinfo SET movie_length = $movie_length WHERE movie_id =  $movie_id";
      if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

    }
    if(!empty($_POST["releaseDate"]))
    {
      $r_Date = $_POST["releaseDate"];
      $releaseDate = date ('Y-m-d', strtotime($r_Date));
      $sql = "UPDATE movieinfo SET releaseDate = '$releaseDate' WHERE movie_id =  $movie_id";
        if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

    }
    if(!empty($_POST["start_promote"]))
    {
      $sp_date = $_POST["start_promote"];
      $start_promote = date ('Y-m-d', strtotime($sp_date));
      $sql = "UPDATE movieinfo SET start_promote = '$start_promote' WHERE movie_id =  $movie_id";
      if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

    }
    if(!empty($_POST["end_promote"]))
    {
      $np_date = $_POST["end_promote"];
      $end_promote = date ('Y-m-d', strtotime($np_date));
      $sql = "UPDATE movieinfo SET end_promote = '$end_promote' WHERE movie_id =  $movie_id";
      if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

    }

    $sql = "SELECT movie_id FROM movieinfo
              WHERE movie_id = '$movie_id';";
        
    $res = mysqli_query($con, $sql);
    if (!$res) {
			die('Error: ' . mysqli_error($con));
		}
    foreach($res as $a)
    {
      $id = $a["movie_id"];
    }


    if($_FILES['inputPosterImage']['movie_name'] == '')
    {
      $filename = "../../home/img/poster/".$id.".jpg";
      unlink($filename);

      $filename = $_FILES["inputPosterImage"]["movie_name"];
      $path = "../../home/img/poster/".$id.".jpg";
      move_uploaded_file($_FILES['inputPosterImage']['tmp_name'],$path);
      
  
    }

    if($_FILES['inputPosterImage']['movie_name'] == '')
    {
      $filename = "../../home/img/promote/".$id.".jpg";
      unlink($filename);    

      $filename = $_FILES["inputPromoteImage"]["movie_name"];
      $path = "../../home/img/promote/".$id.".jpg";
      move_uploaded_file($_FILES['inputPromoteImage']['tmp_name'],$path);
      
  
    }
    

    echo "<script> alert('Edit Movie Information succesful!'); </script>";

?>