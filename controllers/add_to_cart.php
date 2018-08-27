<?php
	session_start();
	$id = $_GET['id'];
	if(isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id] += $_POST['quantity'];
	} else {
		$_SESSION['cart'][$id] = $_POST['quantity'];
	}

	header('location: '.$_SERVER['HTTP_REFERER']);


 ?>