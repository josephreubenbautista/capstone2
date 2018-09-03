<?php
function get_title(){
	echo 'Jcube Basketball | Register';
}
function get_content() { 

	?>
		<h1>Register User</h1>
		<h6 id="registermessage"></h6>
		
		<form action="controllers/register_endpoint.php" method="POST" id="reg">
			<div class="input-group">
				<label for="firstName">First Name: *</label>
				<input class="form-control" type="text" id="firstName" name="firstName" > <span></span>
			</div>
			<div class="input-group">
				<label for="lastName">Last Name: *</label>
				<input class="form-control" type="text" id="lastName" name="lastName" ><span></span>
			</div>
			<div class="input-group">
				<label for="email">Email: *</label>
				<input class="form-control" type="email" id="email" name="email"><span></span>
			</div>

			<div class="input-group">
				<label for="contactNumber">Contact Number: </label>
				<input class="form-control" type="number" id="contactNumber" name="contactNumber" > <span></span>
			</div>
			<div class="input-group">
				<label for="address">Address: </label>
				<textarea class="form-control" id="address" name="address" ></textarea><span></span>
			</div>

			<div class="input-group">
				<label for="username">Username: *</label>
				<input class="form-control" type="text" id="username" name="username" > <span></span>
			</div>
			<div class="input-group">
				<label for="password">Password: *</label>
				<input class="form-control" type="password" id="password" name="password" ><span></span>
			</div>
			<div class="input-group">
				<label for="confirm-password">Confirm Password: *</label>
				<input class="form-control" type="password" id="confirmpassword" name="confirmpassword"><span></span>
			</div>
			<div class="input-group">
				<button type="button" id="registerBtn">Register</button> <small><em>*required</em></small>
			</div>
		</form>
		

	

	
<?php }
	require_once "partials/template.php";
 ?>