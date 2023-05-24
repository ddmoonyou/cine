<?php

	session_start();
	require_once("../connect_db.php");

	if(!isset($_SESSION['staff_id']))
	{
        header('Location: http://localhost/cine/admin/login.php');
		exit();
	}

    //*** Update Last Stay in Login System
	$sql = "UPDATE staffinfo SET session = NOW() WHERE staff_id = '".$_SESSION["staff_id"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM staffinfo WHERE staff_id = '".$_SESSION['staff_id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

    if(empty($_POST["branchname"]) || empty($_POST["branchaddress"])
    || empty($_POST["branchtel"]) || empty($_POST["layout0"])
    || empty($_POST["system0"])
    )
    {
        echo "<script> alert('Data is invalid!'); window.location.href='new-branch.php'; </script>";
    }
    else
    {
        $branchname =  mysqli_real_escape_string($con,$_POST["branchname"]);
        $branchaddress =  mysqli_real_escape_string($con,$_POST["branchaddress"]);
        $branchtel =  mysqli_real_escape_string($con,$_POST["branchtel"]);

        $sql ="INSERT INTO branchinfo(branch_address, branch_telephone, branch_name)
                VALUES ('$branchaddress','$branchtel','$branchname');";

        if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}
        
        $sql = "SELECT branch_id FROM branchinfo
                WHERE branch_name = '$branchname' AND branch_address = '$branchaddress' AND branch_name = '$branchname';";
        
        $res = mysqli_query($con, $sql);
        if (!$res) {
			die('Error: ' . mysqli_error($con));
		}
        foreach($res as $a)
        {
            $id = $a["branch_id"];
        }

        $i = 0;
        while(!empty($_POST["layout".$i])) {
            $curlayout = $_POST["layout".$i];
            $cursystem = $_POST["system".$i];
            if ($cursystem == "Bed") {
                $cursystem = "Bed Cinema";
            }
            $sql ="INSERT INTO theaterinfo(branch_id, theater_no, layout_type, system_type)
            VALUES ('$id','$i'+1,'$curlayout','$cursystem');";

            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error($con));
            }
            $i++;
        }

        echo "<script> alert('Add new branch successful!'); window.location.href='new-branch.php'; </script>";
    } 

?>