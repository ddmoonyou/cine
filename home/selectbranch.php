<?php
	require_once("./connect_db.php");
    $branchID = $_POST['b_id'];
    $movieID = $_POST['m_id'];
    $dateID = $_POST['d_id'];
    $branchID = trim($branchID);
    $movieID = trim($movieID);
    $dateID = trim($dateID);
    // $dateID = date('Y-m-d' , strtotime($dateID));
    
    $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
                where s.theater_no = t.theater_no
                and s.branch_id = t.branch_id
                and b.branch_id = s.branch_id
                and s.movie_id = $movieID
                and date(s.date_time) = date('$dateID')
                and b.branch_id = $branchID
                ORDER BY s.date_time ASC;
                ";
    $res = mysqli_query($conn, $sql);
    // echo ($sql);
    $displayed_date = null;
    $row = mysqli_fetch_assoc($res);

    // $date_time = $row['date_time'];
    // $date = date('d M Y', strtotime($date_time));

    /*
    echo ($row['date_time']);
    ?><br><?php
    // echo ($date);
    ?><br><?php
    echo ($dateID);
    */

    if($row != "" )
    {

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
                                        <div class="card-showing-alt">
                                            <p><img src="./img/icon/video-camera.png" width=20px height=20px> System Type: <?php echo  $row['system_type']; ?> </p>
                                            <p><img src="./img/icon/audio.png" width=25px> <?php echo $row['language_dub'].'/'.$row['language_sub']; ?></p>
                                            <img src="./img/icon/clock.png" width=25px height=25px>
                                            <a href="reservation.php?showing_id=<?php echo $row['showing_id']; ?>">                                      
                                        <button class="btn showing-time-btn" data-showingid="<?php echo $showingID?>"> 
                                            <?php echo $time; ?>
                                        </button> </div>
                                    <?php }  ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    else {
        ?>
            <div class="row justify-content-center"><h6><img src="./img/icon/video-camera.png" width=50px height=50px> We regret to inform you that there are no movie showings at the selected branch or on the specified date.</h6> </div>
        
        <?php
    }
    // while($rows = mysqli_fetch_array($res)){
    // }

    // echo $sql;
    
?>