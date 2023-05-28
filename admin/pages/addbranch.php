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

    if($_FILES['branch_img']['size'] == 0
    ||empty($_POST["branchname"]) || empty($_POST["branchaddress"])
    || empty($_POST["branchtel"]) || empty($_POST["layout0"])
    || empty($_POST["system0"])
    )
    {
        $_SESSION['status'] = 'Data is invalid!';
        $_SESSION['status_text'] = 'Please try again';
        $_SESSION['status_code'] = 'error';
        header('Location: new-branch.php');
        // echo "<script> alert('Data is invalid!'); window.location.href='new-branch.php'; </script>";
    }
    else
    {
        $i = 0;
        $status = 0;
        $sql ="SELECT DISTINCT layout_type FROM seatlayout
            WHERE seat_type = 'Premium Bed';";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }

        $bed = array();
        foreach($result as $no)
        {
            array_push($bed,$no['layout_type']);
        }

        while(!empty($_POST["layout".$i])) {
            $curlayout = $_POST["layout".$i];
            $cursystem = $_POST["system".$i];
            
            if ($cursystem == "Bed") {
                $cursystem = "Bed Cinema";
            }

            if(in_array($curlayout,$bed) && strcmp($cursystem,"Bed Cinema")!=0)
            {
                $status = 1;
            }
            else if(strcmp($cursystem,"Bed Cinema")==0 && !in_array($curlayout,$bed) )
            {
                $status = 1;
            }
            
            $i++;
        }
     
        if($status == 0)
        {
                
            $branchname =  mysqli_real_escape_string($con,$_POST["branchname"]);
            $branchaddress =  mysqli_real_escape_string($con,$_POST["branchaddress"]);
            $branchtel =  mysqli_real_escape_string($con,$_POST["branchtel"]);

            $sql ="INSERT INTO branchinfo(branch_address, branch_telephone, branch_name)
                    VALUES ('$branchaddress','$branchtel','$branchname');";

            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error($con));
            }
            
            $id = mysqli_insert_id($con);
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
            
            $filename = $_FILES["branch_img"]["name"];
            $path = "../../home/img/theatre/".$id.".jpg";
            move_uploaded_file($_FILES['branch_img']['tmp_name'],$path);

            $_SESSION['status'] = 'Successful!';
            $_SESSION['status_text'] = 'Added new branch';
            $_SESSION['status_code'] = 'success';
            header('Location: new-branch.php');
            // echo "<script> alert('Add new branch successful!'); window.location.href='new-branch.php'; </script>";
            
            
        }
        
        else
        {
            $_SESSION['status'] = 'Bed cinema not match the layout!';
            $_SESSION['status_text'] = 'Please try again!';
            $_SESSION['status_code'] = 'error';
            header('Location: new-branch.php');
        }
        
        
    } 

?>