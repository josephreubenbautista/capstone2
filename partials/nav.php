<nav class="navbar navbar-expand-lg navbar-light bg-warning" id="reuben">
	<a class="navbar-brand" href="index.php" id="joseph"><!-- <img src="assets/images/logo.png" id="logo"> --> 
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
					<a class="nav-link nav-text" href="#">Account</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-text" href="#">Transaction</a>
				</li>

			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link nav-text" href="#">MyCart</a>
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
					<a class="nav-link nav-text" href="#">Transactions</a>
				</li>
				

			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link nav-text" href="#">Account</a>
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
			<li class="nav-item">
				<a class="nav-link nav-text" href="products.php">Shop</a>
			</li>
			<li class="nav-item">
				<a class="nav-link nav-text" href="#">League</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link nav-text" href="login.php">Login</a>
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

	