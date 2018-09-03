<?php 
	session_start();

	$filter = $_GET['status'];
	// echo $filter;
	if($filter==0){
		unset($_SESSION['filtering-status']);
	}else{
		$_SESSION['filtering-status'] = $filter;
	}

	// echo $_SESSION['filtering-status'];
	header('location: '.$_SERVER['HTTP_REFERER']);

 ?>