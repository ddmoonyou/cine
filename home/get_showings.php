<?php
// connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cine";
$conn = mysqli_connect($host, $user, $password, $database);

// get the movie ID from the GET parameter
$movieID = $_GET["movie_id"];


// Assume you have already established a connection to your database
if (isset($_POST['movieId'])) {
    $movieID = $_POST['movieID'];

    // Retrieve the available showings for the selected movie ID from the database
    $sql = "SELECT * FROM showings WHERE movie_id = $movieID";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die('Invalid query: ' . mysqli_error($conn));
    }

    // Generate HTML code for the available showings
    $html = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $showingID = $row['showing_id'];
        $date_time = $row['date_time'];
        $html .= '<a href="booking.php?showingId=' . $showingID . '">' . $date_time . '</a><br>';
    }

    // Return the HTML code as a response
    echo $html;
}


// This is the PHP code that generates the HTML code for the available seats based on the showing ID passed in the GET parameter
$showingID = $_GET['showing_id'];

// Retrieve the available seats for the selected showing ID from the database
$sql = "SELECT r.*,reserveseats.* FROM reserveinfo r
        INNER JOIN reserveseats ON r.reserve_id = reserveseats.reserve_id
        WHERE showingID = $showingID";
$result = mysqli_query($conn, $sql);

if (!$result) {
  die('Invalid query: ' . mysqli_error($conn));
}


?>
