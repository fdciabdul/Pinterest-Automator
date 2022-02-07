<?php
session_start();
 require('app/pin/autoload.php'); 
 const IMAGES_DIR = 'resultimage/kwpin';
use seregazhuk\PinterestBot\Factories\PinterestBot;
$bot = PinterestBot::create();
$bot->auth->login($_SESSION['email'], $_SESSION['password']);
$boards = $bot->boards->forUser($_SESSION['username']);
 include 'head.php';
?>
	<div class="row">
	<div class="col-lg-6">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Auto Repins</h6>
                </div>
                <div class="card-body">
                  <form method="GET">
                                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fab fa-pinterest fa-2x "></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Masukan Kata Kunci Pencarian Gambar" aria-label="Username"
                    name="kw"
                      aria-describedby="basic-addon1">
                  </div>
                  <?php  
                    if (isset($_GET['kw']))
{
	
	$pins = $bot->pins->search($_GET['kw'])->take(100)->toArray();

foreach ($pins as $pin) {
    $originalUrl = $pin['images']['orig']['url'];
    $destination = IMAGES_DIR . DIRECTORY_SEPARATOR . basename($originalUrl);
    file_put_contents($destination, file_get_contents($originalUrl));
}
}
	?>
                    </div></div></div>
                    
                    <div class="col-lg-6">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Result</h6>
                </div>
                <div class="card-body">
         
<?php include 'core/resultrepin.php'; ?>

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
                    