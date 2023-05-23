<html>
       <!-- Product Section Begin -->
    <div class="container">
        <div class="col-lg-12 md-8 xs-3">
            <div class='col-lg-8 xd-2'> <h3>Select a Date: </h3> </div>
            <?php
            // get the current date and calculate the max date (one week from today)
            $currentDate = date('Y-m-d');
            $maxDate = date('Y-m-d', strtotime('+1 week'));

            // loop through each day within the range and generate a button for each day
            for ($date = strtotime($currentDate); $date <= strtotime($maxDate); $date += 86400) {
                $dateString = date('d M Y', $date);
                echo "<button class='square-btn' onclick='selectDate(\"$dateString\")'>$dateString</button>";
            }
            ?>
            
            <script>
                function selectDate(dateString) {
                    // do something with the selected date, such as submitting a form
                    document.getElementById("selectedDate").value = dateString;
                    document.getElementById("myForm").submit();
                }
            </script>
            
            <form id="myForm" action="showings.php" method="POST">
                <input type="hidden" id="selectedDate" name="date">
            </form>
        </div>
    </div>
</html>