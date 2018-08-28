<?php 
	session_start();
?>

<?php 
function get_title(){
	echo "Login";
}


function get_content(){
	if (isset($_SESSION['logged_in_user'])){ 
		echo "<h1>WELCOME TO MCDO ".$_SESSION['logged_in_user']."</h1>";
	}else{
?>
		<h1>Welcome Guest!!!</h1>
<?php 
		if(isset($_SESSION['error_message'])){
			echo "<span class='error_message'>".$_SESSION['error_message']."</span>";
			unset($_SESSION['error_message']);
		}
?>
		<form action="controllers/authenticate.php" method="POST">
			<div class="input-group">
				<label for="username">Username: </label>
				<input class="form-control" id="username" name="username" required>
			</div>
			<div class="input-group">
				<label for="password">Password: </label>
				<input class="form-control" type="password" id="password" name="password" required>
			</div>
			<div class="input-group">
				<button>Submit</button>
			</div>
		</form>
<?php
	}
?>
	
<?php 

} 

require_once "partials/template.php";

?>