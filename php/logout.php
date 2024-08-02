<?php 

	session_start();
	if (isset($_SESSION['unique_id'])) {
		// code...
		include_once "config.php";

		$logout_id=mysqli_real_escape_string($conn, $_GET['logout_id']);

		if (isset($logout_id)) {
			// code...
			$status="offline now";

			$sql=mysqli_query($conn, "UPDATE users SET status ='{$status}' WHERE unique_id={$_GET['logout_id']}");
			if ($sql) {
				// code...
				session_unset();
				session_destroy();
				header("location: ../login.php");
			}
		}else
		{
			header("location: ../user.php");
		}

	}else{
		header("location: ../login.php");
	}



 ?>