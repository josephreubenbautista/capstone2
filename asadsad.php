

























<div class="col-lg-12  btn-group">
                  
<input type="number" name="qty" value="<?php echo $quantity; ?>" class="form-control" id="cart-item-qty<?= $id  ?>">


<button class="btn btn-primary cart-btn-update" type="button" data-index="<?php echo $id; ?>">Update</button>

<button class="btn btn-danger cart-btn-remove" type="button" data-index="<?php echo $id; ?>" data-toggle="modal" data-target="#delete-alert">Remove</button>
                  
                  </div>






















<div class="card bg-light mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Light card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
















<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>
















<!-- other NAV -->

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>


<?php 
            if (isset($_SESSION['sorting'])){
              $sorted = $_SESSION['sorting'];
              if($sorted =='ASC'){
                
              }
            }


            
            if (isset($_SESSION['filtering'])){
              $categoryid = $_SESSION['filtering'];
              if($categoryid==$id){
                echo "active";
              }
            }

 ?>



 <?php
                if(isset($_SESSION['error_message'])){
                  echo "<span class='error_message'>".$_SESSION['error_message']."</span>";
                  unset($_SESSION['error_message']);
                }
                if(isset($_SESSION['success_message'])){
                  echo "<span class='success_message'>".$_SESSION['success_message']."</span>";
                  unset($_SESSION['success_message']);
                }
              ?>

