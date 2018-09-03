<?php 
	session_start();
?>

<?php 
function get_title(){
	echo "Jcube Basketball | Home";
}


function get_content(){
?>
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

	<div class="carousel">
		<div id="demo" class="carousel slide" data-ride="carousel">
		  <ul class="carousel-indicators">
		    <li data-target="#demo" data-slide-to="0" class="active"></li>
		    <li data-target="#demo" data-slide-to="1"></li>
		    <li data-target="#demo" data-slide-to="2"></li>
		    <li data-target="#demo" data-slide-to="3"></li>
		    <li data-target="#demo" data-slide-to="4"></li>
		    <li data-target="#demo" data-slide-to="5"></li>
		    <li data-target="#demo" data-slide-to="6"></li>
		  </ul>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="assets/images/carousel/1.jpg" alt="1.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>Joseph Bautista playing the point.</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/2.jpg" alt="2.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>D'Rocks Basketball Team</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/3.jpg" alt="3.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>This is what Camaraderie Cup is made for.</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/4.jpg" alt="4.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>Splitting the defense.</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/5.jpg" alt="5.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>ATTACK!</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/6.jpg" alt="6.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>Where humans became anime characters</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/7.jpg" alt="7.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box ">
		        <h3>Jcube Basketball</h3>
		        <p>The Bae.</p>
		      </div>   
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>
		</div>

	</div>
	<script src="assets/js/register.js"></script>

<?php 

} 



function get_content_admin(){

	
?>


	<div class="carousel">
		<div id="demo" class="carousel slide" data-ride="carousel">
		  <ul class="carousel-indicators">
		    <li data-target="#demo" data-slide-to="0" class="active"></li>
		    <li data-target="#demo" data-slide-to="1"></li>
		    <li data-target="#demo" data-slide-to="2"></li>
		    <li data-target="#demo" data-slide-to="3"></li>
		    <li data-target="#demo" data-slide-to="4"></li>
		    <li data-target="#demo" data-slide-to="5"></li>
		    <li data-target="#demo" data-slide-to="6"></li>
		  </ul>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="assets/images/carousel/1.jpg" alt="1.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>Joseph Bautista playing the point.</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/2.jpg" alt="2.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>D'Rocks Basketball Team</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/3.jpg" alt="3.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>This is what Camaraderie Cup is made for.</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/4.jpg" alt="4.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>Splitting the defense.</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/5.jpg" alt="5.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>ATTACK!</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/6.jpg" alt="6.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>Where humans became anime characters</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/7.jpg" alt="7.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box ">
		        <h3>Jcube Basketball</h3>
		        <p>The Bae.</p>
		      </div>   
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>
		</div>


	</div>

<?php

}






function get_content_user(){
	
?>
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
	<div class="carousel">
		<div id="demo" class="carousel slide" data-ride="carousel">
		  <ul class="carousel-indicators">
		    <li data-target="#demo" data-slide-to="0" class="active"></li>
		    <li data-target="#demo" data-slide-to="1"></li>
		    <li data-target="#demo" data-slide-to="2"></li>
		    <li data-target="#demo" data-slide-to="3"></li>
		    <li data-target="#demo" data-slide-to="4"></li>
		    <li data-target="#demo" data-slide-to="5"></li>
		    <li data-target="#demo" data-slide-to="6"></li>
		  </ul>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="assets/images/carousel/1.jpg" alt="1.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>Joseph Bautista playing the point.</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/2.jpg" alt="2.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>D'Rocks Basketball Team</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/3.jpg" alt="3.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>This is what Camaraderie Cup is made for.</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/4.jpg" alt="4.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>Splitting the defense.</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/5.jpg" alt="5.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>ATTACK!</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/6.jpg" alt="6.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box">
		        <h3>Jcube Basketball</h3>
		        <p>Where humans became anime characters</p>
		      </div>   
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/carousel/7.jpg" alt="7.jpg" class="carousel-image">
		      <div class="carousel-caption caption-box ">
		        <h3>Jcube Basketball</h3>
		        <p>The Bae.</p>
		      </div>   
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>
		</div>


	</div>


<?php
}






require_once "partials/template.php";

?>