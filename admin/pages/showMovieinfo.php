<?php

    ini_set('display_errors', 1);
	session_start();
	require_once("../connect_db.php");

    $k = $_POST["x"];

    $sql = "SELECT * FROM movieinfo WHERE movie_id={$k}";
    $res = mysqli_query($con, $sql);

    while($rows = mysqli_fetch_array($res)){
        $data['name'] = $rows["movie_name"];
        $data['description'] = $rows["movie_description"];
        $data['trailer'] = $rows["movie_trailer"];
        $data['director'] = $rows["director_info"];
        $data['length'] = $rows["movie_length"];
        $data['releaseDate'] = $rows["releaseDate"];
        $data['startpromote'] = $rows["start_promote"];
        $data['endpromote'] = $rows["end_promote"];


    }

    echo json_encode($data);


?>