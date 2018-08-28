<!DOCTYPE html>
<html>
<head>
	<title><?php get_title();?></title>
	<?php require "partials/header.php"; ?>

	<style type="text/css">
		.error_message{
			color: red;
		}
	</style>
</head>
<body>

	<?php 
		require "partials/nav.php";
	?>
	<div id="cont"></div>
	<div class="container" id="container1">

		<?php get_content();?>
	</div>
<?php
	require "partials/footer.php";
?>


</body>
</html>