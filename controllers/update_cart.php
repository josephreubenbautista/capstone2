<?php 
	if (isset($_POST['deletekey'])){
		$key = $_POST['deletekey'];
		$items = $_SESSION['cart'];
		array_splice($items, $key, 1);
	}


 ?>