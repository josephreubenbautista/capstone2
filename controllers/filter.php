<?php 
	session_start();

	$_SESSION['filtering'] = $_GET['filter'];

	header('location: '.$_SERVER['HTTP_REFERER']);

 ?>