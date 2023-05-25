<?php

	session_start();
	require_once("../connect_db.php");

	if(!isset($_SESSION['staff_id']))
	{
        header('Location: http://localhost/cine/admin/login.php');
		exit();
	}

    $count = 0;

    $promotion_codes = array();
    $payment_methods = array("PayPal", "Credit-cards", "Debit-cards", "Online-payment");
    $layout_capacity = array(12, 16, 20, 24, 75, 126);
    $layout_capacity_but_sane = array(6, 6, 10, 10, 20, 30);
    $promotion_codes = array("AIS15", "BLOCKBUSTER", "DTAC20", "STUDENT20");

    /*$sql = "SELECT promotion_code FROM promotion;";
        
    $res = mysqli_query($con, $sql);
    if (!$res) {
		die('Error: ' . mysqli_error($con));
	}
    foreach($res as $a)
    {
        $code = $a["promotion_code"];
        array_push($promotion_codes,$code);
    }

    print_r($promotion_codes);
    echo count($promotion_codes);*/

    for ($showings = 481005446; $showings <= 481010763; $showings++) {
        $sql = "SELECT theaterinfo.layout_type FROM theaterinfo
                INNER JOIN showings ON showings.branch_id = theaterinfo.branch_id AND showings.theater_no = theaterinfo.theater_no
                WHERE showing_id = '$showings'
                GROUP BY theaterinfo.layout_type;";
        $res = mysqli_query($con, $sql);
        if (!$res) {
            die('Error: ' . mysqli_error($con));
        }
        foreach($res as $a)
        {
            $curlayout_type = $a["layout_type"];
        }

        /*echo "<p> $curlayout_type </p>";*/
        $alphabet = range('A', 'Z');
        $curlayout_type_num = array_search($curlayout_type, $alphabet);

        for ($times = 0; $times <= rand(0, $layout_capacity_but_sane[$curlayout_type_num]); $times++) {

            $curpromotion = NULL;
            $promotion_chance = rand(0, 100);
            $payment_chance = rand(0, 100);
            if ($promotion_chance > 65){
                $curpromotion = $promotion_codes[rand(0,count($promotion_codes)-1)];
            }
            if ($payment_chance > 70){
                $curpayment = $payment_methods[3];
            }
            else if ($payment_chance > 50){
                $curpayment = $payment_methods[2];
            }
            else if ($payment_chance > 15){
                $curpayment = $payment_methods[1];
            }
            else{
                $curpayment = $payment_methods[0];
            }


            echo "<p> $showings $curpromotion $curpayment </p>";

            /*if ($promotion_chance > 65){
                $sql = "INSERT INTO reserveinfo(showing_id, promotion_code, payment_method)
                       VALUES ('$showings', '$curpromotion', '$curpayment');";
                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error($con));
                }
            }else{
                $sql = "INSERT INTO reserveinfo(showing_id, payment_method)
                       VALUES ('$showings', '$curpayment');";
                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error($con));
                }
            }*/
            $count++;
        }
    }
    
    echo $count;

    /*$sql ="INSERT INTO showings(movie_id,branch_id,theater_no,date_time,language_dub,language_sub)
    VALUES ($movie_id,$branch_id,$theater_no,'$mysqltime','$audio','$subtitle');";*/
    


?>