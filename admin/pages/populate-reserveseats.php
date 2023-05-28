<?php

	session_start();
	require_once("../connect_db.php");

	if(!isset($_SESSION['staff_id']))
	{
        header('Location: http://localhost/cine/admin/login.php');
		exit();
	}

    $count = 0;
    $showing_id_memory = 0;
    $seat_range = array(range(300001, 300012), range(300013, 300028), range(300029, 300048), range(300049, 300072), range(300073, 300147), range(300148, 300273));
    
    for ($reserve = 28276; $reserve <= 68798; $reserve++) {
        $sql = "SELECT theaterinfo.layout_type FROM theaterinfo
                INNER JOIN showings ON showings.branch_id = theaterinfo.branch_id AND showings.theater_no = theaterinfo.theater_no
                INNER JOIN reserveinfo ON showings.showing_id = reserveinfo.showing_id
                WHERE reserve_id = '$reserve'
                GROUP BY theaterinfo.layout_type;";
        $res = mysqli_query($con, $sql);
        if (!$res) {
            die('Error: ' . mysqli_error($con));
        }
        foreach($res as $a)
        {
            $curlayout_type = $a["layout_type"];
        }
        /* echo "<p> $curlayout_type </p>"; */

        /* lazily copying the previous query */

        $sql = "SELECT showings.showing_id FROM showings
                INNER JOIN reserveinfo ON showings.showing_id = reserveinfo.showing_id
                WHERE reserve_id = '$reserve'
                GROUP BY showings.showing_id;";
        $res = mysqli_query($con, $sql);
        if (!$res) {
            die('Error: ' . mysqli_error($con));
        }
        foreach($res as $a)
        {
            $curshowing_id = $a["showing_id"];
        }
        /* echo "<p> $curshowing_id </p>"; */

        $alphabet = range('A', 'Z');
        $curlayout_type_num = array_search($curlayout_type, $alphabet);

        if ($curshowing_id != $showing_id_memory){
            echo "<p> $reserve </p>";
            $showing_id_memory = $curshowing_id;
            shuffle($seat_range[$curlayout_type_num]);
            $curseat_index = 0;
        }

        echo $seat_range[$curlayout_type_num][$curseat_index];
        echo "<p></p>";

        $finalseat = $seat_range[$curlayout_type_num][$curseat_index];

        /*$sql = "INSERT INTO reserveseats(reserve_id, seat_id)
                VALUES ('$reserve', '$finalseat');";
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }*/

        $curseat_index++;
        $count++;
    }
    
    echo $count;

    /*$sql ="INSERT INTO showings(movie_id,branch_id,theater_no,date_time,language_dub,language_sub)
    VALUES ($movie_id,$branch_id,$theater_no,'$mysqltime','$audio','$subtitle');";*/
    


?>