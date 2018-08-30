<?php 
	session_start();
?>

<?php 
function get_title(){
	echo "Jcube Basketball | Home";
}


function get_content(){
?>
		
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

	
?>




	<div class="carousel">
		

	</div>

<?php

}






function get_content_user(){
	
?>
	<div class="carousel">
		

	</div>


<?php
}






require_once "partials/template.php";

?>