

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