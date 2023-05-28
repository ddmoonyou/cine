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
        $_SESSION['status'] = 'Data is invalid!';
        $_SESSION['status_text'] = 'Please try again';
        $_SESSION['status_code'] = 'error';
        header('Location: new-showing.php');
        // echo "<script> alert('Data is invalid!'); window.location.href='new-showing.php'; </script>";
    }
    else
    {
        $movie_id =  $_POST["movie_id"];
        $branch_id =  $_POST["branch_id"];
        $theater_no =  $_POST["theater_no"];
        $t =  $_POST["time"];
        $audio =  $_POST["audio"];
        $subtitle =  $_POST["subtitle"];    
        

        $sql = "SELECT theater_no FROM theaterinfo
                WHERE branch_id = $branch_id;";

        

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }
        $teather = array();
        foreach($result as $t_no)
        {
            array_push($teather,$t_no['theater_no']);
        }

        
        if(in_array($theater_no,$teather))
        {
            $sql ="SELECT s.showing_id,s.date_time,s.movie_id,m.movie_length FROM showings s
                LEFT JOIN movieinfo m ON s.movie_id = m.movie_id
                WHERE s.branch_id = $branch_id AND s.theater_no = $theater_no;";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die('Error: ' . mysqli_error($con));
            }
            $all_time = array();
            foreach($result as $time)
            {
                $temp = array();
                $temp['date_time'] = $time['date_time'];
                $temp['len'] = $time['movie_length'];
                $temp['new'] = 0;
                array_push($all_time,$temp);
            }

            $sql ="SELECT movie_length FROM movieinfo
                    WHERE movie_id = $movie_id";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die('Error: ' . mysqli_error($con));
            }

            $len = mysqli_fetch_assoc($result)['movie_length'];

            foreach($t as $time)
            {
                $mysqltime = date ('Y-m-d H:i:s', strtotime($time));
                $temp = array();
                $temp['date_time'] = $mysqltime;
                $temp['len'] = $len;
                $temp['new'] = 1;
                array_push($all_time,$temp);
            }
            

            function compareDates($date1, $date2){
                return strtotime($date1['date_time']) - strtotime($date2['date_time']);
            }

            usort($all_time, "compareDates");
           
            
            $status = 0;
            $count = count($all_time);
            for($i=0;$i<$count-1;$i++)
            {
                
                $date1 = strtotime($all_time[$i]['date_time']);
                
                $date2 = strtotime($all_time[$i+1]['date_time']);
                $interval = $date2 - $date1;
                $minutes = floor($interval  / 60);
                if($i>0 && ($all_time[$i]['new']==1 ||$all_time[$i+1]['new']==1 ))
                {
                    if($minutes<$all_time[$i]['len'])
                    {
                        echo $i."<br>".$all_time[$i]['date_time']."  ".$all_time[$i+1]['date_time']." ".$all_time[$i]['len'] ."<br>";
                        $status = 1;
                    }
                }
                
            
                
            }
            
            if($status==1)
            {
                $_SESSION['status'] = 'Showing time overlaps!';
                $_SESSION['status_text'] = 'Please try again';
                $_SESSION['status_code'] = 'error';
                header('Location: new-showing.php');
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

                $_SESSION['status'] = 'Successful!';
                $_SESSION['status_text'] = 'Added new showing';
                $_SESSION['status_code'] = 'success';
                header('Location: new-showing.php');

                // echo "<script> alert('Add new showing succesful!'); window.location.href='new-showing.php'; </script>";
                
            }
        } 
        else
        {
            $_SESSION['status'] = 'Theater number not found!';
            $_SESSION['status_text'] = 'Please try again';
            $_SESSION['status_code'] = 'error';
            header('Location: new-showing.php');
        }     
    } 
?>