<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<link rel = "icon" href = "./dist/img/AdminLTELogo.png" type = "image/x-icon">

<?php
	session_start();

	require_once("connect_db.php");

	//*** Update Status
	$sql = "UPDATE staffinfo SET loginstatus = 0, session = '0000-00-00 00:00:00' WHERE staff_id = '".$_SESSION["staff_id"]."' ";
	$query = mysqli_query($con,$sql);

	session_destroy();
	echo "<script>
			$(document).ready(function() {
				Swal.fire({
					title: 'Logout Successful!',
					text: 'Wait a moment...',
					icon: 'success',
					timer: 5000,
					showConfirmButton: false
				});
			});
	</script>";
	header('refresh:2.3; url=login.php');
	// header("location:login.php");
?>