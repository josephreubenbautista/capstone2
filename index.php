<?php 
	session_start();
?>

<?php 
function get_title(){
	echo "Jcube Basketball | Home";
}


function get_content(){
?>
		<h1>Welcome Guest!!!</h1>
<?php 
		if(isset($_SESSION['error_message'])){
			echo "<span class='error_message'>".$_SESSION['error_message']."</span>";
			unset($_SESSION['error_message']);
		}
?>
<?php
	
?>
	<div class="carousel">
		

	</div>
<?php 

} 



function get_content_admin(){

	echo "<h1>WELCOME TO MCDO ".$_SESSION['logged_in_user']."</h1>";

?>




	<div class="carousel">
		

	</div>

<?php

}






function get_content_user(){
	echo "<h1>WELCOME TO MCDO ".$_SESSION['logged_in_user']."</h1>";

?>
	<div class="carousel">
		

	</div>


<?php
}






require_once "partials/template.php";

?>