<!DOCTYPE html>
<html>
<head>
	<title><?php get_title();?></title>
	<?php require_once "partials/header.php"; ?>

</head>
<body>

<?php 
		require_once "partials/nav.php";
?>
	<div id="cont"></div>
	<div class="container" id="container1">

<?php 
	if (isset($_SESSION['logged_in_user'])){

		if($_SESSION['logged_in_role']==2){
			get_content_admin();
		}else{
			get_content_user();
		}
	}else{
		get_content();
	}
	
		
?>




	</div>
<?php
	require_once "partials/footer.php";
?>


</body>
</html>