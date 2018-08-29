<?php
	session_start();
	$id = $_POST['id'];
	if(isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id] += $_POST['quantity'];
		echo "Successfully added";
	} else {
		$_SESSION['cart'][$id] = $_POST['quantity'];
		echo "Successfully added";
	}
	
	


 ?>