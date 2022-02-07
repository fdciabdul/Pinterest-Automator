<?php
session_start();
 require('app/pin/autoload.php'); 
use seregazhuk\PinterestBot\Factories\PinterestBot;
use GuzzleHttp\Client;
require 'app/vendor/autoload.php';
$bot = PinterestBot::create();
$bot->auth->login($_SESSION['email'], $_SESSION['password']);
$boards = $bot->boards->forUser($_SESSION['username']);
 require 'head.php';
 include 'dom.php';
 $images = glob('postblog/*.html');
if(empty($images)) {
   
?>
	
	<div class="col-lg-6">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Blogger Importer</h6>
                </div>
                <div class="card-body">
                  <form  method="post">
                                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-globe fa-2x "></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="https://aqin.my.id" aria-label="Url blog "
                    name="blog"
                      aria-describedby="basic-addon1">
                  </div>
                  
                   
                    
                    <input type="submit" class="btn btn-outline-success mb-1" value="Import">
                    </form>
                    </div></div></div>
                    
                    <div class="col-lg-6">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tidak ada postingan tersedia , silahkan import dulu</h6>
                </div>
                <div class="card-body">
                	
	</div></div></div></div>
	<?php
}else{
	
?>
	<div class="col-lg-6">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Import To Pinterest</h6>
                </div>
                <div class="card-body">
                  <form  method="post">
                                  
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-globe fa-2x "></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Domain Custom Untuk Pin" aria-label="Url blog "
                    name="urlpin"
                      aria-describedby="basic-addon1">
                  </div>
                  
                   
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Pilih Papan</label>
                      <select name="board"  class="form-control" id="exampleFormControlSelect1">
      
             <?php
 foreach ($boards as $i){
  echo '<option value="'.$i['id'].'" data-thumbnail="'.$i['image']['url'].'">'.$i['name'].'</option>';
 }
 ?> 
                      </select>
                    </div>
                   
                    <input type="submit" class="btn btn-outline-success mb-1" value="Import">
                    </form>
                    </div></div></div>
       
                	<div class="col-lg-6">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Result</h6>
                </div>
                <div class="card-body">
                <?php include 'ambilDariBlog.php'; 
}?>
	

                         </div></div></div>
                         
                  
                    
<?php

if (isset($_POST['blog']))
{
if ($urlParts = parse_url($_POST['blog']))
  $base = $urlParts["scheme"] . "://" . $urlParts["host"];
function create_slug($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '-');
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // lowercase
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

$client = new Client([
    'base_uri' => $_POST['blog'],
]);

$response = $client->request('GET', '/feeds/posts/default?alt=json&max-results=500');
$data = json_decode($response->getBody());
$numberOfPosts = $data->feed->{'openSearch$totalResults'}->{'$t'};
$numberOfPages = ceil($numberOfPosts/150);

// yoksa yazilar klasörünü oluştur
if (! is_dir('postblog')) {
    mkdir('postblog');
    
}
for ($i=0; $i < $numberOfPages; $i++) {
    $index = ($i * 150) + 1;
    $response = $client->request('GET', "/feeds/posts/default?alt=json&start-index={$index}&max-results=150");
    $data = json_decode($response->getBody());
    $posts = $data->feed->entry;

    foreach ($posts as $post) {
        $info = $post->link[4];
        $content = '<!DOCTYPE html><html lang="tr"><head><meta charset="UTF-8"><title>Document</title></head><body>';
        $content .= "<h1 class=\"abdulgantengbanget\">{$info->title}</h1>";
        $content .= "<a class=\"mantap\" href='{$info->href}'>{$info->href}</a>";

        // Blogspot feed gives you some values in a $t variable. Very inconvenient when you are using PHP. However there are
        // workorounds for that. Wrap it between curly braces and quotes.
        $content .= "<p><div class=\"oke\"{$post->published->{'$t'}}</p>";
        $content .= $post->content->{'$t'} . "<br>";
        $content .= '</div></body></html>';

        $fileName = 'postblog/' . create_slug($info->title) . '.html';
        $file = fopen($fileName, 'wb');
        fwrite($file, $content);
        fclose($file);
    }
}
} ?>

  <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - Crafted by
              <b><a href="https://m.facebook.com/fdciabdul/" target="_blank">Abdul Muttaqin</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->

                 
</body>

</html>