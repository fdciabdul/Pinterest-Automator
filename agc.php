<?php
session_start();
 require('app/pin/autoload.php'); 
use seregazhuk\PinterestBot\Factories\PinterestBot;
$bot = PinterestBot::create();
$boards = $bot->boards->forUser($_SESSION['username']);
 include 'head.php';
 require 'app/mail/PHPMailerAutoload.php';
include 'dom.php';
$mail = new PHPMailer;
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'mail.merahputih.id';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'basmal10@merahputih.id'; // your email id
$mail->Password = 'mana123'; // your password
$mail->SMTPSecure = 'tls';                  
$mail->Port = 587;     //587 is used for Outgoing Mail (SMTP) Server.
$mail->setFrom('Pinterest_Automator@merahputih.id', 'Pinterest Automator');

?>
<div class="row">
	<div class="col-lg-6">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Auto Grab Content</h6>
                </div>
                <div class="card-body">
                  <form method="post">
                                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fab fa-blogger fa-2x "></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="emailblog.usernameblog@blogger.com" aria-label="Username"
                    name="emailblog"
                      aria-describedby="basic-addon1">
                  </div>
                  
                    
                   
                    
                    <input type="submit" class="btn btn-outline-success mb-1" id="test">
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
  if (isset($_POST['emailblog']))
{
// If account is public you can query Instagram without auth
$eblo = $_POST['emailblog'];

if (ob_get_level() == 0) ob_start();

$images = glob('postblog/*.html');
if(empty($images)) {
    echo "Tak ada file nya\n";
    die();
}

$image = $images[0];

foreach ($images as $image){
	$yy = file_get_html($image);
	$p = $yy->find("a[class=mantap]");

foreach($yy as $e){
    foreach($yy->find('h1') as $judul){
     $mail->addAddress($eblo);   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML
$bodyContent = $e;
$mail->Subject = $judul->plaintext;
$mail->Body    = $bodyContent;
if(!$mail->send()) {
  echo 'Gagal .';
} else {
  echo '</br>Posting sudah di kirimkam dengan judul <b> '.$judul->plaintext.'</b></br>';
}
echo '</br>Posting sudah di kirimkam dengan judul <b> '.$judul->plaintext.'</b></br>';
}
}
}
}else{
	echo ' 
	<h3> Cara mendapatkan email blogger </h3>
	</br> Buka blogger agan agan sekalian , lalu pergi ke pengaturan dan klik bagian email</br>
	Lalu atur email blogger nya di bagian ini</br>
	<img class="img-responsive" height="150" widht="250"  src="img/emailblogger.png"> 
';
}
	
     ?>
                         </div></div></div></div>
                    
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
                    