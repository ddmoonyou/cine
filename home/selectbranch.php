<?php

function showTimeByType($row, $res, $systemtype, $subtitle, $audio) {
    echo ("1");
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
    if($branchID != "" || $dateID != "") {

        
            /*----------------
                    4D
            ------------------*/
            // สำหรับ 4D EN/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'EN'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }

            // สำหรับ 4D EN/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'EN'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D EN/JP
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'EN'
                and s.language_sub = 'JP'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D EN/KR
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'EN'
                and s.language_sub = 'KR'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D EN/RU
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'EN'
                and s.language_sub = 'RU'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D TH/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'TH'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D TH/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'TH'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D TH/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRTHT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'TH'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
                // สำหรับ 4D TH/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'TH'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }

            // สำหรับ 4D TH/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'TH'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D TH/JP
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'TH'
                and s.language_sub = 'JP'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D TH/KR
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'TH'
                and s.language_sub = 'KR'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D TH/RU
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'TH'
                and s.language_sub = 'RU'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D JP/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'JP'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }

            // สำหรับ 4D JP/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'JP'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D JP/JP
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'JP'
                and s.language_sub = 'JP'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D JP/KR
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'JP'
                and s.language_sub = 'KR'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D JP/RU
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'JP'
                and s.language_sub = 'RU'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D KR/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'KR'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }

            // สำหรับ 4D KR/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'KR'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D KR/JP
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'KR'
                and s.language_sub = 'JP'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D KR/KR
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'KR'
                and s.language_sub = 'KR'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4D KR/RU
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4D'
                and s.language_dub = 'KR'
                and s.language_sub = 'RU'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }

            /*----------------
                    4Dx
            ------------------*/
            // สำหรับ 4Dx EN/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4Dx'
                and s.language_dub = 'EN'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4Dx', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4Dx EN/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4Dx'
                and s.language_dub = 'EN'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4Dx TH/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4Dx'
                and s.language_dub = 'TH'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ 4Dx TH/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = '4Dx'
                and s.language_dub = 'TH'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }

            /*----------------
                    IMAX
            ------------------*/
            // สำหรับ IMAX EN/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = 'IMAX'
                and s.language_dub = 'EN'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4Dx', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ IMAX EN/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = 'IMAX'
                and s.language_dub = 'EN'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ IMAX TH/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = 'IMAX'
                and s.language_dub = 'TH'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ IMAX TH/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = 'IMAX'
                and s.language_dub = 'TH'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }

            /*----------------
                    Laser
            ------------------*/
            // สำหรับ Laser EN/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = 'Laser'
                and s.language_dub = 'EN'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4Dx', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ Laser EN/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = 'Laser'
                and s.language_dub = 'EN'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ Laser TH/TH
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = 'Laser'
                and s.language_dub = 'TH'
                and s.language_sub = 'TH'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
            // สำหรับ Laser TH/EN
                $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and b.branch_id = $branchID
                and t.branch_id = $branchID
                and s.branch_id = $branchID
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID') /* original: CURRENT_DATE() */
                and t.system_type = 'Laser'
                and s.language_dub = 'TH'
                and s.language_sub = 'EN'
                ORDER BY s.date_time ASC;
                ";
                $res = mysqli_query($conn, $sql);
                $displayed_date = null;
                $row = mysqli_fetch_assoc($res);
                if($row != ""){
                    showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
                }
        }
    else {
        ?>
            <div class="row justify-content-center"><h6><img src="./img/icon/video-camera.png" width=50px height=50px> Please select the branch and time you want to watch the movie.</h6> </div>
        <?php
        exit();
    }


    if($row != "")
    {
       /* while ($row = mysqli_fetch_assoc($res)) {
            if($row['system_type'] == '4D') {
                echo ("4D");
                showTimeByType($row, $res, '4D', $row['language_sub'], $row['language_dub']);
            }
            elseif($row['system_type'] == '4Dx') {
                echo ("4Dx");
                showTimeByType($row, $res, '4Dx', $row['language_sub'], $row['language_dub']);
            }
            elseif($row['system_type'] == 'IMAX') {
                echo ("IMAX");
                showTimeByType($row, $res, 'IMAX', $row['language_sub'], $row['language_dub']);
            }
            else {
                showTimeByType($row, $res, 'LASER', $row['language_sub'], $row['language_dub']);
            }
        }     */

        // if($row['system_type'] == '4D') {
        //     showTimeByType($row, $res, $row['system_type'], $row['language_sub'], $row['language_dub']);
        
        // }
        // elseif($row['system_type'] == '4Dx') {
        //     showTimeByType($row, $res, $row['system_type'], $row['language_sub'], $row['language_dub']);
        // }
        // elseif($row['system_type'] == 'IMAX') {
        //     showTimeByType($row, $res, $row['system_type'], $row['language_sub'], $row['language_dub']);
        // }
        // else {
        //     showTimeByType($row, $res, $row['system_type'], $row['language_sub'], $row['language_dub']);
        // }
        
    }
    else {
        /*?>
            <div class="row justify-content-center"><h6><img src="./img/icon/video-camera.png" width=50px height=50px> We regret to inform you that there are no movie showings at the selected branch or on the specified date.</h6> </div>
        
        <?php*/
    }
?>