<?php
	session_start();
	require "../connection.php";
	$uname = $_POST['username'];
	$pword = sha1($_POST['password']);

	$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pword'";


	$result = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_assoc($result);
	extract($rows);

	if(mysqli_num_rows($result)>0){
		$_SESSION['logged_in_user'] = $username;
	}else{
		$_SESSION['error_message'] = "Login Failed";
	}


	header("Location: ../index.php"); /* Redirect browser */
		// exit();

?>