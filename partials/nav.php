<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="reuben">
	<a class="navbar-brand" href="index.php" id="joseph">
		<img src="assets/images/carousel/logo.png" id="logo"> 
			
	</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarNav">


<?php  
	if (isset($_SESSION['logged_in_user'])){
		if($_SESSION['logged_in_role']==1) {
?>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link nav-text" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="products.php">Shop</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="#">League</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link nav-text" href="transaction.php">Transaction</a>
				</li>

			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link nav-text" href="cart.php">MyCart<span class="badge badge-danger" id="badge-cart">
						<?php 
							if(isset($_SESSION['item-quantity'])){
								echo $_SESSION['item-quantity'];
							}else{
								echo "0";
							}

						 ?>

					</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="#" data-toggle="modal" data-target="#edituser-modal"><?php echo $_SESSION['logged_in_firstname']; ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="logout.php">Logout</a>
				</li>
				
			</ul>

<?php
		}else{
?>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link nav-text" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="#">Users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="#">League</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="products.php">Products</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="transaction.php">Transactions</a>
				</li>
				

			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link nav-text" href="#" data-toggle="modal" data-target="#edituser-modal"><?php echo $_SESSION['logged_in_firstname']; ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="logout.php">Logout</a>
				</li>
				
			</ul>
<?php
		}
		
	}else{


?>
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link nav-text" href="index.php">Home</a>
			</li>
			<li class="nav-item" data-toggle="modal" data-target="#login-modal">
				<a class="nav-link nav-text" href="#">Shop</a>
			</li>
			<li class="nav-item">
				<a class="nav-link nav-text" href="#">League</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">
			<li class="nav-item" data-toggle="modal" data-target="#login-modal">
				<a class="nav-link nav-text" href="#">Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link nav-text" href="#" data-toggle="modal" data-target="#register-modal">Register</a>
			</li>
			
		</ul>

<?php 
	}
?>
	</div> <!-- end collapse menu -->
</nav> <!-- end nav -->

<div id="spaced">&nbsp;</div>


	<!-- Login Modal -->
	<div class="modal" id="login-modal">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Login</h4>
					<button class="close" type="button" data-dismiss="modal">X</button>
				</div>
				<form action="controllers/authenticate.php" method="POST" id="loginformsubmit">
					<div class="modal-body">
						
							<div class="input-group">
								<input class="form-control" id="usernamelogin" name="username" placeholder="username" required><span></span>
							</div>
							<div class="input-group">
								<input class="form-control" type="password" id="passwordlogin" name="password" placeholder="password" required><span></span>
							</div>
						
					</div> <!-- end modal body -->

					<div class="modal-footer">
						<button class="btn btn-primary" id="loginBtn" type="button">Login</button>
						<button class="btn btn-success" type="button" data-toggle="modal" data-target="#register-modal" data-dismiss="modal">Sign up</button>
					</div>
				</form>
			</div>
		</div>
	</div>



	<div class="modal" id="register-modal">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Register</h4>
					<button class="close" type="button" data-dismiss="modal">X</button>
				</div>
				<form action="controllers/register_endpoint.php" method="POST">
					<div class="modal-body">
						<h6 id="registermessage"></h6>
							<div class="input-group">
								<input class="form-control" type="text" id="firstName" name="firstName" placeholder="First Name" required> <span></span>
							</div>
							<div class="input-group">
								<input class="form-control" type="text" id="lastName" name="lastName" placeholder="Last Name" required><span></span>
							</div>
							<div class="input-group">
								<input class="form-control" type="email" id="email" name="email" placeholder="Email Address" required><span></span>
							</div>
							<div class="input-group">
								<input class="form-control" type="number" id="contactNumber" name="contactNumber" placeholder="0915 XXX XXXX">
							</div>
							<div class="input-group">
								<textarea class="form-control" id="address" name="address" placeholder="Home Address"></textarea>
							</div>
						
							<div class="input-group">
								<input class="form-control" type="text" id="usernamereg" name="username" placeholder="Username"> <span></span>
							</div>

							<div class="input-group">
								<input class="form-control" type="password" id="passwordreg" name="password" placeholder="Password"><span></span>
							</div>

							<div class="input-group">
								<input class="form-control" type="password" id="confirmpasswordreg" name="confirmpassword" placeholder="Retype Password"><span></span>
							</div>
						
					</div> <!-- end modal body -->

					<div class="modal-footer">
						<button class="btn btn-primary" type="button" id="registerBtn">Register</button>
						<button class="btn btn-success" type="button" data-toggle="modal" data-target="#login-modal" data-dismiss="modal">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
