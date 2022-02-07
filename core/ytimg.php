<?php
include 'dom.php';
require('app/pin/autoload.php'); 
use seregazhuk\PinterestBot\Factories\PinterestBot;
$bot = PinterestBot::create();
$bot->auth->login($_SESSION['email'], $_SESSION['password']);
$boards = $bot->boards->forUser($_SESSION['username']);
if (isset($_POST['yt']))
{
				$email     = $_SESSION['email'];
				$pass      = $_SESSION['password'];
				$userp     = $_SESSION['username'];
				$keyword      = $_POST['yt'];
				$boardId = $_POST['board'];
$keyword = $keyword;
$img_arr = array();
$img_arr = youtube_img_query($img_arr, $keyword, 35);

  
?>
	<div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Keyword</th>
                        <th>Gambar</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
    <?php
				foreach ($img_arr as $i)
				{
								$bot->pins->create($i, $boardId, $keyword);
								echo '<tr>
      <td> <b> ' . $keyword . '</b><br />
      </td>';
								echo '
      <td><img src="' . $i. '" height="40" widht="40"><br/>
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


function youtube_img_query($array, $keyword, $resultcnt)
  {
    $url           = 'https://www.youtube.com/results?search_query=' . preg_replace("/\s+/", "+", $keyword);
    $page_link_arr = array();
    for ($link_cnt = 0; count($page_link_arr) < 1; $link_cnt++)
      {
        $html          = curl_to_html($url);
        $page_link_arr = youtube_pagebox_link($page_link_arr, $html);
      }
    for ($img_cnt = 0; count($array) < $resultcnt; $img_cnt++)
      {
        foreach ($html->find('span[class=yt-thumb-simple] img') as $img)
          {
            $img_tmp     = $img;
            $img_tmp_arr = explode('/', $img_tmp);
            if ($img_tmp_arr[2] == 'i.ytimg.com')
              {
                $img_link = 'https://i.ytimg.com/vi/' . $img_tmp_arr[4] . '/mqdefault.jpg';
                array_push($array, $img_link);
              }
          }
        $html = curl_to_html($page_link_arr[$img_cnt]);
      }
    return $array;
  }
function youtube_pagebox_link($array, $html)
  {
    foreach ($html->find('div[class=branded-page-box search-pager  spf-link] a') as $page_link)
      {
        $link_tmp = 'https://www.youtube.com' . $page_link->href;
        array_push($array, $link_tmp);
      }
    return $array;
  }
function curl_to_html($url)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    $html = new simple_html_dom();
    $html->load($result);
    return $html;
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

