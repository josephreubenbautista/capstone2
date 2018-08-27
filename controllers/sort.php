<?php 
	session_start();

	$_SESSION['sorting'] = $_GET['sort'];

	header('location: '.$_SERVER['HTTP_REFERER']);


 ?>