<?php

	session_start();
	require_once("../connect_db.php");

	if(!isset($_SESSION['staff_id']))
	{
        header('Location: http://localhost/cine/admin/login.php');
		exit();
	}

    

    $count = 0;

    /* 2023-05-25 01:00:00 */
    $movie_release_dates = array("2023-06-26", "2023-07-07", "2023-05-26", "2023-05-26", "2023-05-26", "2023-05-26", "2023-08-22", "2023-05-26", "2023-07-03", "2023-06-27", "2023-05-26", "2023-05-27");
    $movie_bias = array(50, 20, 30, 30, 10, 10, 20, 10, 35, 40, 5, 30);
    $showing_times = array(" 10:00:00", " 12:30:00", " 15:00:00", " 17:30:00", " 20:00:00", " 22:30:00");
    $theater_counts = array(4, 8, 6, 7, 6, 4, 8, 6, 7, 6, 4, 8, 6, 7, 6, 4, 8, 6, 7, 6);
    $branch_bias = array(0, 15, 15, 0, 8, 0, 0, 0, 0, 0, 0, 0, 13, 5, 0, 0, 0, 0, 0, 0);
    $datebias_table = array(10, 0, 0, 0, 3, 8, 13);

    for ($branch = 0; $branch <= 19; $branch++) {
        $curbranch_bias = $branch_bias[$branch];

        for ($theater = 0; $theater <= $theater_counts[$branch] - 1; $theater++) {

            $occupied = array('');

            for ($mve = 0; $mve <= 11; $mve++) {

                if ($theater%2 == 0){
                    $mv = $mve;
                }   else{
                    $mv = 11 - $mve;
                }

                $curmovie_bias = $movie_bias[$mv];
                $curdate = new DateTime( $movie_release_dates[$mv] );

                for ($day = 0; $day <= 30; $day++) {

                    shuffle($showing_times);

                    $daybias = $datebias_table[jddayofweek(unixtojd( $curdate->getTimestamp()))];

                    for ($times = 0; $times <= rand(0, 5); $times++) {
                        if (rand(0, 100) + $curbranch_bias + $curmovie_bias + (30-$day) > 100){
                            /* emergency volume control */
                            if (rand(0, 100) + $daybias > 90 and !in_array($curdate->format('Y-m-d') . $showing_times[$times], $occupied)){

                                if ($branch > 12){
                                    $audio = "EN";
                                    $subtitle = "EN";
                                }
                                else{
                                    if (rand(0, 100) > 40){
                                        $audio = "TH";
                                        $subtitle = "TH";
                                    }
                                    else{
                                        $audio = "EN";
                                        $subtitle = "TH";
                                    }
                                } 

                                if ($mv == 11){
                                    if (rand(0, 100) > 20){
                                        $audio = "JP";
                                    }
                                }
                                
                                array_push($occupied, $curdate->format('Y-m-d') . $showing_times[$times]);

                                $mysqltime = date ('Y-m-d H:i:s', strtotime($curdate->format("Y-m-d") . $showing_times[$times]));
                                $curbranch_id = 1001+$branch;
                                $curmovie_id = 100000001+$mv;
                                $curtheater = 1+$theater;
                                echo "<p>$curbranch_id $curtheater $curmovie_id $mysqltime $audio $subtitle $daybias</p>";
                                $count++;
                                /*$sql ="INSERT INTO showings(movie_id,branch_id,theater_no,date_time,language_dub,language_sub)
                                    VALUES ($curmovie_id,$curbranch_id,$curtheater,'$mysqltime','$audio','$subtitle');";
                                if (!mysqli_query($con, $sql)) {
                                    die('Error: ' . mysqli_error($con));
                                }*/
                                
                            }
                        }
                        /*echo rand(0, 1);*/
                    }

                    $curdate->modify('+1 day');
                }
            }
        }

    }
    echo $count;

    /*$sql ="INSERT INTO showings(movie_id,branch_id,theater_no,date_time,language_dub,language_sub)
    VALUES ($movie_id,$branch_id,$theater_no,'$mysqltime','$audio','$subtitle');";*/
    


?>