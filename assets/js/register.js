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


	if(userName.val().length==0){
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