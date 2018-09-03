<?php 
	session_start();
	$filter = $_GET['pay'];

	if($filter==0){
		unset($_SESSION['filtering-payment']);
	}else{
		$_SESSION['filtering-payment'] = $filter;
	}

	header('location: '.$_SERVER['HTTP_REFERER']);

 ?>