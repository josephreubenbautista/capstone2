<nav class="navbar navbar-expand-lg navbar-light bg-light" id="reuben">
	<a class="navbar-brand" href="index.php" id="joseph">
		<!-- <img src="assets/images/logo.png" id="logo">  -->
			JCube Basketball
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
					<a class="nav-link nav-text" href="#"><?php echo $_SESSION['logged_in_firstname']; ?></a>
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
					<a class="nav-link nav-text" href="#"><?php echo $_SESSION['logged_in_firstname']; ?></a>
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
				<a class="nav-link nav-text" href="register.php">Register</a>
			</li>
			
		</ul>

<?php 
	}
?>
	</div> <!-- end collapse menu -->
</nav> <!-- end nav -->




	<!-- Login Modal -->
	<div class="modal" id="login-modal">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Login</h4>
					<button class="close" type="button" data-dismiss="modal">X</button>
				</div>
				<form action="controllers/authenticate.php" method="POST">
					<div class="modal-body">
						
							<div class="input-group">
								<input class="form-control" id="username" name="username" placeholder="username" required>
							</div>
							<div class="input-group">
								<input class="form-control" type="password" id="password" name="password" placeholder="password" required>
							</div>
						
					</div> <!-- end modal body -->

					<div class="modal-footer">
						<button class="btn btn-primary">Login</button>
						<a href="register.php"><button class="btn btn-success" type="button">Sign up</button></a>
					</div>
				</form>
			</div>
		</div>
	</div>