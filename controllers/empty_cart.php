<?php 

	session_start();
	
	if(isset($_POST['clicked'])){

		unset($_SESSION['cart']);

		
		unset($_SESSION['item-quantity']);
		
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	
 ?>