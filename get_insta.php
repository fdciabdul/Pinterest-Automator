<?php
session_start();
 require('app/pin/autoload.php'); 
use seregazhuk\PinterestBot\Factories\PinterestBot;
$bot = PinterestBot::create();
$bot->auth->login($_SESSION['email'], $_SESSION['password']);
$boards = $bot->boards->forUser($_SESSION['username']);
 include 'head.php';
?>
	<style>
		.fade-in-bl {
	-webkit-animation: fade-in-bl 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
	        animation: fade-in-bl 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
}
/* ----------------------------------------------
 * Generated by Animista on 2020-5-28 13:55:12
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

/**
 * ----------------------------------------
 * animation fade-in-bl
 * ----------------------------------------
 */
@-webkit-keyframes fade-in-bl {
  0% {
    -webkit-transform: translateX(-50px) translateY(50px);
            transform: translateX(-50px) translateY(50px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(0) translateY(0);
            transform: translateX(0) translateY(0);
    opacity: 1;
  }
}
@keyframes fade-in-bl {
  0% {
    -webkit-transform: translateX(-50px) translateY(50px);
            transform: translateX(-50px) translateY(50px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(0) translateY(0);
            transform: translateX(0) translateY(0);
    opacity: 1;
  }
}
</style>
	<div class="col-lg-6">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Instagram To Pinterest</h6>
                </div>
                <div class="card-body">
                  <form method="GET">
                  	<label for="exampleFormControlSelect1">Get Instagram Image </label>
                                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fab fa-instagram fa-2x "></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username Instagram Target" aria-label="Username"
                    name="ig"
                      aria-describedby="basic-addon1">
     
                      <input type="number" class="form-control" id="exampleFormControlInput1"
                      name="jumlah"
                        placeholder="300">
                        	<input type="submit" class="btn btn-outline-info mb-1" onclick="myFunction()">
                    </div></form>
                 <?php  
                    if (isset($_GET['jumlah']))
{
	?>
                    	<form method="POST">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Pilih Pin</label>
                      <select name="board"  class="form-control" id="exampleFormControlSelect1">
      
             <?php
 foreach ($boards as $i){
  echo '<option value="'.$i['id'].'" data-thumbnail="'.$i['image']['url'].'">'.$i['name'].'</option>';
 }
 ?> 
                      </select>
                    </div>
                   
                    <div id="url" class="form-group">
                      <label for="exampleFormControlReadonly">Url</label>
                      <input class="form-control" type="text" placeholder="https://"
                      name="url">
                    </div>
                    <input type="submit" class="btn btn-outline-success mb-1"><?php
                    }
                   ?>
                    </form>
                    </div></div></div>
                    
                    <div class="col-lg-6">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Result</h6>
                </div>
                <div class="card-body">
                	<?php
 include 'core/resultig.php'; ?>

                         </div></div></div></div>
                    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - Crafted by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">Abdul Muttaqin</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

</body>

</html>
                    