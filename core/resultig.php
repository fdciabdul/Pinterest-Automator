<?php

require('app/pin/autoload.php');
require_once("app/ig/autoload.php");
use seregazhuk\PinterestBot\Factories\PinterestBot;
$bot = PinterestBot::create();
if (isset($_POST['ig']))
{
				$email     = $_SESSION['email'];
				$pass      = $_SESSION['password'];
				$userp     = $_SESSION['username'];
				$user      = $_POST['ig'];
				$jumlah    = $_POST['jumlah'];
				$instagram = new \InstagramScraper\Instagram();
				$medias    = $instagram->getMedias($user, $jumlah);
				$bot->auth->login($email, $pass);
				$boards  = $bot->boards->forUser($userp);
				$boardId = $_POST['board'];
?>
	

                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Caption</th>
                        <th>Gambar</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
    <?php
				foreach ($medias as $media)
				{
								$bot->pins->create($media['imageHighResolutionUrl'], $boardId, $keyword);
$keyword = substr($media['caption'], 0, 20);
								echo '<tr>
      <td> <b> ' . $keyword . '</b><br />
      </td>';
								echo '
      <td><img src="' . $media['imageHighResolutionUrl'] . '" height="40" widht="40"><br/>
      </td>';
								echo '<td>
      Succes Pinned ☑️</b><br />
      </td></tr>';
								
								ob_flush();
								flush();
								sleep(5);
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

