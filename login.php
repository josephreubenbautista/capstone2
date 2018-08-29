<?php 
	session_start();
?>

<?php 
function get_title(){
	echo "Jcube Basketball | Login";
}


function get_content(){

?>

	<h1>Log in Page</h1>

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

require_once "partials/template.php";

?>