<?php

function showTimeByType($row, $res, $systemtype, $subtitle, $audio) {
    ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 md-6 xs-3">
                        <div class="showings-container">
                            <div class="blog__item">
                                <div class="card-showing"> 
                                    <div class="card-top-showing">
                                        <h6 style="color:white"><img src="./img/icon/location.png" width=20px height=24px > <?php  echo $row['branch_name']; ?></h6>
                                    </div>
                                    
                                    <?php
                                    /* print ข้างนอกก่อน 1 รอบ */
                                        $showingID = $row['showing_id'];
                                        $branch_name = $row['branch_name'];
                                        $date_time = $row['date_time'];
                                        $time = date('H:i', strtotime($date_time));
                                        $date = date('d M Y', strtotime($date_time));
                                        $theatre_no = $row['theater_no'];

                                    ?>          
                                        <div class="card-showing-alt">
                                            <p><img src="./img/icon/video-camera.png" width=20px height=20px> System Type: <?php echo  $systemtype; ?> </p>
                                            <p><img src="./img/icon/audio.png" width=25px> <?php echo $audio.'/'.$subtitle; ?></p>
                                            <img src="./img/icon/clock.png" width=25px height=25px>
                                            <a href="reservation.php?showing_id=<?php echo $row['showing_id']; ?>">                                      
                                            <button class="btn showing-time-btn" data-showingid="<?php echo $showingID?>"> 
                                                <?php echo $time; ?>
                                            </button> 
                                            </a>
                                        
                                        <?php

                                        /* while loop print จนครบทุกรอบ */
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $date_time = $row['date_time'];
                                            $time = date('H:i', strtotime($date_time));
                                            $date = date('d M Y', strtotime($date_time));
                                            ?> 
                                                <a href="reservation.php?showing_id=<?php echo $row['showing_id']; ?>">                   
                                                <button class="btn showing-time-btn" data-showingid="<?php echo $showingID?>">
                                                    <?php echo $time; ?>
                                                </button> 
                                                </a>
                                            <?php 
                                        }                          
                                        ?>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
}

	require_once("./connect_db.php");
    $branchID = $_POST['b_id'];
    $movieID = $_POST['m_id'];
    $dateID = $_POST['d_id'];
    $branchID = trim($branchID);
    $movieID = trim($movieID);
    $dateID = trim($dateID);

    // ถ้าลูกค้าเลือก Branch กับ Date
    if(!empty($_POST["b_id"]) && !empty($_POST["d_id"])) {
            
            $possible_combos = array();

            $sql = "SELECT DISTINCT s.language_sub, s.language_dub, t.system_type FROM showings s,theaterinfo t,branchinfo b
            where s.theater_no = t.theater_no
            and b.branch_id = $branchID
            and t.branch_id = $branchID
            and s.branch_id = $branchID
            and s.branch_id = t.branch_id
            and b.branch_id = s.branch_id
            and s.movie_id = $movieID
            and date(s.date_time) = date('$dateID')
            ORDER BY s.date_time ASC;
            ";
            $res = mysqli_query($conn, $sql);

            foreach($res as $row)
            {
                array_push($possible_combos, [$row["language_sub"], $row["language_dub"], $row["system_type"]]);
            }

            foreach($possible_combos as $combo){
            $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID')
                and t.system_type = '$combo[2]'
                and s.language_dub = '$combo[1]'
                and s.language_sub = '$combo[0]'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
            }

            if (empty($possible_combos)){
                ?>
                    <div class="row justify-content-center"><h6><img src="./img/icon/video-camera.png" width=50px height=50px> We regret to inform you that there are no movie showings at the selected branch or on the specified date.</h6> </div>
                <?php
            }

        }
else {
    ?>
        <div class="row justify-content-center"><h6><img src="./img/icon/video-camera.png" width=50px height=50px> Please select the branch and time you want to watch the movie. </h6> </div>
    <?php
    exit();
}
?>