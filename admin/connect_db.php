<?php
  $servername = "127.0.0.1";  // server name localhost
  $username = "root";    // username to access database id20613770_cinebyhansa
  $password = "";    // password to access database %1tcYSTb0gf}1+YM
  $dbname = "cine"; // name of the database

  // Create a connection to MySQL database
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check if the connection is successful
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  //echo "Connected successfully";

  ?> 