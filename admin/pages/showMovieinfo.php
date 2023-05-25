<?php

	session_start();
	require_once("../connect_db.php");

    $k = $_POST['id'];
    $k = trim($k);

    $sql = "SELECT * FROM movieinfo WHERE movie_id='{$k}'";
    $res = mysqli_query($con, $sql);

    while($rows = mysqli_fetch_array($res)){
?>
        <?php echo "<input name='movie_name' type='text' id='inputMoviename' class='form-control' Value=$rows[movie_name]>"; ?>
        <?php echo "<input name='movie_name' type='text' id='inputMoviename' class='form-control' Value=$rows[movie_description]>"; ?>
        <?php echo "<input name='movie_name' type='text' id='inputMoviename' class='form-control' Value=$rows[movie_trailer]>"; ?>
        <?php echo $rows['movie_name']; ?>
        <?php echo $rows['movie_description']; ?>



    <?php
    }

    echo $sql;

?>