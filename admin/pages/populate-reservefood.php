<?php

	session_start();
	require_once("../connect_db.php");

	if(!isset($_SESSION['staff_id']))
	{
        header('Location: http://localhost/cine/admin/login.php');
		exit();
	}

    $count = 0;

    for ($reserve = 28276; $reserve <= 68798; $reserve++) {
        if (rand(0, 100) > 20){
            for ($food = 101; $food <= 148; $food++) {

                $amount = 1;
                if(rand(0, 100) > 98){
                    $amount = 3;
                }else if(rand(0, 100) > 90){
                    $amount = 2;
                }

                $bias = sin($food * 6347);
                $bias -= floor($bias);

                if (rand(0,100) > 33){

                /*if ($food <= 112){
                    if (rand(0, 100) > 94 - $bias * 4){
                        echo $food;
                        $sql = "INSERT INTO reservefood(reserve_id, food_id, quantity)
                                VALUES ('$reserve', '$food', '$amount');";
                        if (!mysqli_query($con, $sql)) {
                            die('Error: ' . mysqli_error($con));
                        }
                        $count++;
                    }
                } else if($food <= 128){
                    if (rand(0, 100) > 98 - $bias * 4){
                        echo $food;
                        $sql = "INSERT INTO reservefood(reserve_id, food_id, quantity)
                                VALUES ('$reserve', '$food', '$amount');";
                        if (!mysqli_query($con, $sql)) {
                            die('Error: ' . mysqli_error($con));
                        }
                        $count++;
                    }
                } else if($food <= 140){
                    if (rand(0, 100) > 92 - $bias * 4){
                        echo $food;
                        $sql = "INSERT INTO reservefood(reserve_id, food_id, quantity)
                                VALUES ('$reserve', '$food', '$amount');";
                        if (!mysqli_query($con, $sql)) {
                            die('Error: ' . mysqli_error($con));
                        }
                        $count++;
                    }
                } else {
                    if (rand(0, 100) > 98 - $bias * 4){
                        echo $food;
                        $sql = "INSERT INTO reservefood(reserve_id, food_id, quantity)
                                VALUES ('$reserve', '$food', '$amount');";
                        if (!mysqli_query($con, $sql)) {
                            die('Error: ' . mysqli_error($con));
                        }
                        $count++;
                    }
                }*/

                }
            }
        }
        echo "new";
        echo "<p></p>";
    }
    
    echo $count;

    /*$sql ="INSERT INTO showings(movie_id,branch_id,theater_no,date_time,language_dub,language_sub)
    VALUES ($movie_id,$branch_id,$theater_no,'$mysqltime','$audio','$subtitle');";*/
    


?>