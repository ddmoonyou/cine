<?php

      $servername = "127.0.0.1";  
      $username = "root";   
      $password = "";    
      $dbname = "cine"; 

      // Create a connection to MySQL database
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      // Check if the connection is successful
      if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
      }


      //print_r($_POST);
      var_dump($selectedSeats);
      
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['select_seat'])) {
              // Loop through the selected seats
              foreach ($_POST['select_seat'] as $selectedSeat) {
                // Access the seat information
                $seatInfo = json_decode($selectedSeat, true);
                $row = $seatInfo['seat_row'];
                $column = $seatInfo['seat_column'];
          
                // Perform further processing with the seat information
                // For example, store the selected seat in the database or perform validation
          
                // Print the selected seat
                echo "Selected seat: Row $row, Column $column<br>";
              }
            } else {
              echo "No seats selected";
            }
          }
?>