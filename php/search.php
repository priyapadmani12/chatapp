<?php 

	session_start();

	include_once "config.php";

	$outgoing_id=$_SESSION['unique_id'];
	$seatchTerm=mysqli_real_escape_string($conn,$_POST['searchTerm']);
	$sql="SELECT * FROM users WHERE NOT unique_id={$outgoing_id} AND (fname LIKE '%{$seatchTerm}%' OR lname LIKE '%{$seatchTerm}%' )";

	$output="";

	$query=mysqli_query($conn, $sql);
	if (mysqli_num_rows($query)>0)
	{
		include_once "data.php";
		// code...
	}else
	{
		$output='No user found related to your search term';
	}
	echo $output;

 ?>