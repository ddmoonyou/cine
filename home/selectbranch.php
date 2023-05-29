<?php
	require_once("./connect_db.php");
    $branchID = $_POST['b_id'];
    $movieID = $_POST['m_id'];
    $branchID = trim($branchID);
    $movieID = trim($movieID);

    
    $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = CURRENT_DATE()
                and b.branch_id = $branchID
                ORDER BY s.date_time ASC;
                ";
    $res = mysqli_query($conn, $sql);
    $displayed_date = null;
    $row = mysqli_fetch_assoc($res)
    ?>
    <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-13 md-8 xs-3">
                        <div class="showings-container">
                            <div class="blog__item">
                                <div class="card-showing"> 
                                    <div class="card-top-showing">
                                        <h6 style="color:white"><img src="./img/icon/location.png" width=20px height=24px> <?php  echo $row['branch_name']; ?></h6>
                                        </div><br>
                                        <p><img src="./img/icon/video-camera.png" width=20px height=20px> System Type: <?php echo  $row['system_type']; ?> </p>
                                        <p><img src="./img/icon/audio.png" width=25px> <?php echo $row['language_dub'].'/'.$row['language_sub']; ?></p>
                                        <img src="./img/icon/clock.png" width=25px height=25px>
                                        <a href="reservation.php?showing_id=<?php echo $row['showing_id']; ?>"> 

    <?php

    while ($row = mysqli_fetch_assoc($res)) {
        $showingID = $row['showing_id'];
        $branch_name = $row['branch_name'];
        $date_time = $row['date_time'];
        $time = date('H:i', strtotime($date_time));
        $date = date('d M Y', strtotime($date_time));
        $theatre_no = $row['theater_no'];
        $language_sub = $row['language_sub'];
        $language_dub = $row['language_dub'];
        $system_type = $row['system_type'];

        ?>                                                
                                        <button class="btn showing-time-btn" data-showingid="<?php echo $showingID?>"> 
                                            <?php echo $time; ?>
                                        </button> 
        <?php
    }
    ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
    // while($rows = mysqli_fetch_array($res)){
    // }

    // echo $sql;
    
?>