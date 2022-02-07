<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
session_start();
 require('app/pin/autoload.php'); 
use seregazhuk\PinterestBot\Factories\PinterestBot;
$bot = PinterestBot::create();
if(isset($_SESSION['email'])) {
$bot->auth->login($_SESSION['email'], $_SESSION['password']);
$boards = $bot->boards->forUser($_SESSION['username']);
 include 'head.php';
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sukses Login <?php echo $boards[0]['owner']['full_name'];
 ?></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body"><a href="get_insta.php">
                  <div class="row align-items-center">
                    <div class="col mr-2">
  
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Auto Post Instagram User Images To Pinterest</div></a>
              
                
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-instagram fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="blogger_import.php">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Auto Post Blogger Rss To Pinterest</div>
             </a>
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-blogger fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="get_userpin.php">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Auto Repin Pinterest</div></a>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-pinterest-square fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="ytpin.php">
                      <div class="h5 mb-0 font-weight-bold text-green-800">Youtube Thumbnail To Pinterest</div>
             </a>
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-youtube fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="agc.php">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Auto Grab Content Blogger</div></a>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-blogger fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Area Chart -->
            
            

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

</body>

</html>
<?php
}
else{
 	echo "<script>alert('login dulu gan');</script>";
            echo "<script>window.location.assign('login.php');</script>"; 
            }
            ?>