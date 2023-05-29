<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<link rel = "icon" href = "./dist/img/AdminLTELogo.png" type = "image/x-icon">

<?php
	session_start();
	

	require_once("connect_db.php");
	
	$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);

	$strSQL = "SELECT * FROM staffinfo WHERE staff_id = '".$strUsername."' 
	and Password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		// $_SESSION['status'] = 'Username or Password Incorrect!';
		// $_SESSION['status_text'] = 'Please try again';
		// $_SESSION['status_code'] = 'error';
		echo "<script>
				$(document).ready(function() {
					Swal.fire({
						title: 'Wrong Staff ID or Password!',
						text: 'Please try again',
						icon: 'error',
						timer: 5000,
						showConfirmButton: false
					});
				});
		</script>";
		header('refresh:2.3; url=login.php');
		exit ();
		// echo "<script> alert('Username or Password Incorrect!'); window.location.href='login.php'; </script>";
		// exit();
	}
	else
	{
		if($objResult["loginstatus"] == 1)
		{
			// $_SESSION['status'] = 'This account is currently being logged in!';
			// $_SESSION['status_text'] = 'Please try again';
			// $_SESSION['status_code'] = 'warning';
			echo "<script>
					$(document).ready(function() {
						Swal.fire({
							title: 'This account is already logged in!',
							text: 'Please try again',
							icon: 'warning',
							timer: 5000,
							showConfirmButton: false
						});
					});
			</script>";
			header('refresh:2.8; url=login.php');
			exit ();
			// echo "<script> alert('$strUsername already loged in!'); window.location.href='login.php'; </script>";
			// exit();
		}
		else
		{
			//*** Update Status Login
			$sql = "UPDATE staffinfo SET loginstatus = 1 , session = NOW() WHERE staff_id = '".$objResult["staff_id"]."' ";
			$query = mysqli_query($con,$sql);

			//*** Session
			$_SESSION["staff_id"] = $objResult["staff_id"];
			session_write_close();

			//*** Go to Main page
			// $_SESSION['status'] = 'Successfully!';
			// $_SESSION['status_text'] = 'login success';
			// $_SESSION['status_code'] = 'success';
			echo "<script>
					$(document).ready(function() {
						Swal.fire({
							title: 'Login Successful!',
							text: 'Wait a moment...',
							icon: 'success',
							timer: 5000,
							showConfirmButton: false
						});
					});
			</script>";
			header('refresh:2.3; url=index.php');
			exit ();
			// header("location:index.php");
			// exit ();
		}
			
	}
	mysqli_close($con);
	
?>