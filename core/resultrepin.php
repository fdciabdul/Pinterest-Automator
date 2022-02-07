<?php

require('app/pin/autoload.php'); 

use seregazhuk\PinterestBot\Factories\PinterestBot;


$bot = PinterestBot::create();
if (isset($_POST['domain']))
{
	$email     = $_SESSION['email'];
				$pass      = $_SESSION['password'];
				$userp     = $_SESSION['username'];
				$boardId = $_POST['board'];
				$domain = $_POST['domain'];
$bot->auth->login($email, $pass);
				$boards  = $bot->boards->forUser($userp);

$pins = $bot->pins->search($_POST['kw'])->toArray();
$counter = 0;
?>
	<!doctype html>
<title>Long PHP process example</title>
<style>
body {
	font-family: 'Lucida Grand', Tahoma, Verdana, Arial, sans-serif;
	font-size: 14px;
}

#progress_bar {
	width: 100%;
	border: #ccc 1px solid;
	border-radius: 4px;
	height: 25px;
	margin: 0 auto;
	background: #efefef;
	text-align: left;
	display: inline-block;
	position: relative;
	text-align: center;
	line-height: 25px;
	vertical-align: middle;
	z-index: 1;
}

#progress_bar_inner {
	display: block;
	height: 25px;
	background-color: #89be5e;
	width: 0;
	position: absolute;
	top: 0;
	left: 0;
	-webkit-transition: all 500ms cubic-bezier(.4,.1,.4,1) 0ms;
	-moz-transition: all 500ms cubic-bezier(.4,.1,.4,1) 0ms;
	-o-transition: all 500ms cubic-bezier(.4,.1,.4,1) 0ms;
	transition: all 500ms cubic-bezier(.4,.1,.4,1) 0ms;
	z-index: 1;
}
#percent {
	z-index: 8;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
}
</style><div id="feedback">Beginning Processing&hellip;</div>
<div id="progress_bar"><span id="percent">0%</span><span id="progress_bar_inner"></span></div>

<script type="text/javascript">
var feedback = document.getElementById('feedback'),
    percent_text = document.getElementById('percent'),
    progress_bar_inner = document.getElementById('progress_bar_inner');

function updateFeedback (message, percent) {
	feedback.innerHTML = message;
	percent_text.innerHTML = percent + '%';
	progress_bar_inner.style.width = percent + '%';
}
</script>
<?php
function updateFeedback ($message, $percent) {
	echo "<script type=text/javascript>updateFeedback('$message', $percent);</script>";
}
$arr = array(0.5, 0.75, 0.25);
$items = 10;
while (--$items) {
	$s = $items === 1 ? '' : '';
	$percent = ((10-$items)/10) * 100;
	updateFeedback("$items Loading &hellip;", $percent);
	if ($items === 1){
		updateFeedback("Script dijalankan", $percent);
		}
	
ob_flush();
								flush();
	sleep(array_rand($arr)); // simulate something that takes 2 seconds to complete

}
?>
	<div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Nomor</th>
                        <th>Nama Pengepin</th>
                        <th>Gambar</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      	
                      	<?php
                      
$images = glob('../resultimage/kwpin/*.jpg');
if(empty($images)) {
    echo "Tak ada file nya\n";
    die();
}

$image = $images[0];
foreach ($image as $gambar) {
foreach ($pins as $pin) {
    // repin to our board
    $bot->pins->create($gambar, $boardId, $_POST['kw'], $domain);
    echo '<tr>
      <td> <b> ' . $counter++ . '</b>
      </td>';
      echo '
      <td> <b> <img src="' .$pin['pinner']['image_medium_url'].'" class="img-profile rounded-circle" height="50" width="50"style="object-fit: cover;">' . $pin['pinner']['full_name'] . '</b>
      </td>';
								echo '
      <td><img class="img-profile rounded-circle"src="' .$pin['images']['orig']['url'].'" height="50" width="50"style="object-fit: cover;">
      </td>';
								echo '<td>
      Succes Pinned ☑️</b>
      </td></tr>';
								
								ob_flush();
								flush();
								sleep(1);
    

}
}

?>
</tr>
                    </tbody>
                  </table><script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
                </div>
 <?php
}
else
{
				echo " Result in here ";
				echo '
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  

';
}
?>

  <!-- Scroll to top -->
  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>

