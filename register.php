<?php
function get_title(){
	echo 'Jcube Basketball | Register';
}
function get_content() { 

	?>
		<h1>Register User</h1>
		<div class="row">
			<div class="col-lg-12">
				<?php 

					if(isset($_SESSION['error_message'])){
				?>
						<div class="alert alert-danger" role="alert">
							<h4 class="alert-heading">ERROR</h4>
							<p><?php echo $_SESSION['error_message'] ?></p>

						</div>

				<?php


						unset($_SESSION['error_message']);
					}
					if(isset($_SESSION['success_message'])){
				?>
						<div class="alert alert-success" role="alert">
							<h4 class="alert-heading">SUCCESS</h4>
							<p><?php echo $_SESSION['success_message'] ?></p>

						</div>

				<?php

						unset($_SESSION['success_message']);
					}


				 ?>
			</div>
		</div>
		
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
		

	
		<script type="text/javascript">
			$('#registerBtn').click( () => {
	const userName = $('#username');
	const password = $('#password');
	const confirmPassword = $('#confirmpassword');

	const firstName = $('#firstName');
	const lastName = $('#lastName');
	const email = $('#email');
	const contactNumber = $('#contactNumber');
	const address = $('#address');
			
	const uname = userName.val();
	const emailval = email.val();
	const passwordval = password.val();

	const firstnameval = firstName.val();
	const lastnameval = lastName.val();
	const contactval = contactNumber.val();
	const addressval = address.val();
			

	let errFlag = false;

	if (firstName.val().length==0){
		firstName.next().css('color', 'red');
		firstName.next().html('This field is required');
		errFlag = true;
	}

	if (lastName.val().length==0){
		lastName.next().css('color', 'red');
		lastName.next().html('This field is required');
		errFlag = true;
	}


	if(uname.length==0){
		userName.next().css('color', 'red');
		userName.next().html('This field is required');
		errFlag = true;
	}else{
		$.ajax({
			url : 'controllers/check_username.php',
			method : 'post',
			data : {username : uname},
			async : false
		}).done(data =>{
			if (data==1){
				userName.next().css('color', 'red');
				userName.next().html('Username Already Exist');
				errFlag = true;
			} else {
				userName.next().css('color', 'green');
				userName.next().html('Username still available');
			}
		});
	}

	if(email.val().length==0){
		email.next().css('color', 'red');
		email.next().html('This field is required');
		errFlag = true;
	}else{
		$.ajax({
			url : 'controllers/check_email.php',
			method : 'post',
			data : {email : emailval},
			async : false
		}).done(data =>{
			if (data==1){
				email.next().css('color', 'red');
				email.next().html('Email already used');
				errFlag = true;
			} else {
				email.next().css('color', 'green');
				email.next().html('Email still available');
			}
		});
	}

				

				

	if(password.val().length==0){
		password.next().css('color', 'red');
		password.next().html('This field is required');
		errFlag = true;
	}else{
		password.next().html('');
		if(password.val()!=confirmPassword.val()){
			confirmPassword.next().css('color', 'red');
			confirmPassword.next().html('passwords did not match');
			errFlag = true;
		}else{
			confirmPassword.next().html('');
		}
	}



	if(errFlag==false){
		$.ajax({
			method : 'post',
			url: 'controllers/register_endpoint.php',
			data: {username : uname,
					password: passwordval,
					firstName: firstnameval,
					lastName: lastnameval,
					email: emailval,
					contactNumber: contactval,
					address: addressval
					},
		}).done( data =>{
			

			$('#registermessage').html(data);
			$('#registermessage').css('color', 'green');

			userName.val('');
			email.val('');
			password.val('');
			firstName.val('');
			lastName.val('');
			contactNumber.val('');
			address.val('');
			confirmPassword.val('');


			userName.next().html('');
			email.next().html('');
			password.next().html('');
			firstName.next().html('');
			lastName.next().html('');
			confirmPassword.next().html('');

		});
				
	}

});
		</script>
	
<?php }
	require_once "partials/template.php";
 ?>