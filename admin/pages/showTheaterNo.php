<?php

	require_once("../connect_db.php");
    $branchID = $_POST['b_id'];
    $branchID = trim($branchID);

    if(!empty($_POST["b_id"])) {
            
            $sql = "SELECT DISTINCT theater_no, system_type FROM theaterinfo WHERE branch_id=$branchID;
            ";
            $res = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($res);
            
            ?>
                <option value=<?php echo($row['theater_no']);?>> <?php echo($row['theater_no']); ?>:  <?php echo($row['system_type']); ?></option>
            <?php
            if(!empty($row)) {
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <option value=<?php echo($row['theater_no']);?>> <?php echo($row['theater_no']); ?>:  <?php echo($row['system_type']); ?></option>
                    <?php
                }
            }

    }
    else {
        ?>
            <option value=""> Theater not available</option>
        <?php
        exit();
    }
?>