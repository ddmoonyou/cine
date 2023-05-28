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
            $_SESSION['status'] = 'End date must be after start date!';
            $_SESSION['status_text'] = 'Please try again';
            $_SESSION['status_code'] = 'error';
            header('Location: new-movie.php');

        } else if($premiere_time > $r_date)
        {
            $_SESSION['status'] = 'Premiere date must be before release date!';
            $_SESSION['status_text'] = 'Please try again';
            $_SESSION['status_code'] = 'error';
            header('Location: new-movie.php');
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

            
            if(in_array($theater,$teather))
            {
                $sql ="SELECT s.showing_id,s.date_time,s.movie_id,m.movie_length FROM showings s
                    LEFT JOIN movieinfo m ON s.movie_id = m.movie_id
                    WHERE s.branch_id = $branch_id AND s.theater_no = $theater;";
                $result = mysqli_query($con, $sql);
                if (!$result) {
                    die('Error: ' . mysqli_error($con));
                }
                $all_time = array();
                foreach($result as $ti)
                {
                    $temp = array();
                    $temp['date_time'] = $ti['date_time'];
                    $temp['len'] = $ti['movie_length'];
                    $temp['new'] = 0;
                    array_push($all_time,$temp);
                }

                

                $len = mysqli_fetch_assoc($result)['movie_length'];

                $mysqltime = date ('Y-m-d H:i:s', strtotime($time));
                $temp = array();
                $temp['date_time'] = $mysqltime;
                $temp['len'] = $len;
                $temp['new'] = 1;
                array_push($all_time,$temp);
                

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
                    header('Location: new-movie.php');
                }
                else
                {
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
            else
            {
                $_SESSION['status'] = 'Theater number not found!';
                $_SESSION['status_text'] = 'Please try again';
                $_SESSION['status_code'] = 'error';
                header('Location: new-movie.php');
            }

        }
    }

?>