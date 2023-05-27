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
        $t =  $_POST["time"];
        $audio =  $_POST["audio"];
        $subtitle =  $_POST["subtitle"];    
        

        $sql ="SELECT date_time FROM showings
                WHERE movie_id = $movie_id AND branch_id = $branch_id AND theater_no = $theater_no";

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }
        $all_time = array();
        foreach($result as $time)
        {
            array_push($all_time,$time['date_time']);
        }

        foreach($t as $time)
        {
            $mysqltime = date ('Y-m-d H:i:s', strtotime($time));
            array_push($all_time,$mysqltime);
        }

        function compareDates($date1, $date2){
            return strtotime($date1) - strtotime($date2);
         }

        usort($all_time, "compareDates");


        $sql ="SELECT movie_length FROM movieinfo
                WHERE movie_id = $movie_id";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }

        $len = mysqli_fetch_assoc($result)['movie_length'];
        $status = 0;
        $i=0;
        foreach($all_time as $time)
        {
            if($i>0)
            {
                $date1 = strtotime($all_time[$i-1]);
                $date2 = strtotime($time);
                $interval = $date2 - $date1;
                $minutes = floor($interval  / 60);
                if($minutes<$len)
                {
                    $status = 1;
                }
            }
            $i++;
            
        }

        if($status==1)
        {
            echo "<script> alert('Showing time invalid!'); window.location.href='new-showing.php'; </script>";
        }
        else
        {
            foreach($t as $time)
            {
                
                $mysqltime = date ('Y-m-d H:i:s', strtotime($time));
               // echo "<p> $mysqltime</p>";
                $sql ="INSERT INTO showings(movie_id,branch_id,theater_no,date_time,language_dub,language_sub)
                        VALUES ($movie_id,$branch_id,$theater_no,'$mysqltime','$audio','$subtitle');";
                if ($mysqltime!='1970-01-01 01:00:00' &&!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error($con));
                }
            }

            echo "<script> alert('Add new showing succesful!'); window.location.href='new-showing.php'; </script>";
            
        }
        
    } 
    
    


?>