<?php


use seregazhuk\PinterestBot\Factories\PinterestBot;
$bot = PinterestBot::create();

$bot->auth->login($_SESSION['email'], $_SESSION['password']);
$boards = $bot->boards->forUser($_SESSION['username']);
if (isset($_POST['board']))
{
// If account is public you can query Instagram without auth
$boardid = $_POST['board'];
$url = $_POST['urlpin'];

if (ob_get_level() == 0) ob_start();
?>
	
<table class="table table-responsive-sm table-dark">
  <thead>
    <tr>
      <th>Caption</th>
      <th>Gambar</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  	<?php
 $images = glob('postblog/*.html');
if(empty($images)) {
    echo "Tak ada file nya\n";
    die();
}

$image = $images[0];

foreach ($images as $image){
	$yy = file_get_html($image);
	$p = $yy->find("a[class=mantap]");

foreach($yy->find('img') as $e){
    foreach($yy->find('h1') as $judul){
    	foreach($yy->find("a[class=mantap]"); as $link){
     $bot->pins->create($e->src, $boardid, $judul->plaintext, $link->plaintext);
     echo '<tr>
      <td> <b> ' .$judul->plaintext. '</b><br />
      </td>';
	echo '
      <td><img src="'.$e->src.'" class="img-responsive" height="20" widht="20"><br/>
      </td>';
      echo '<td>
      Succes Pinned ☑️</b><br />
      </td></tr>';
      sleep(5);
      ob_flush();
      flush();
}
}
}
}
}else{
	echo " Result in here";
	}
	?>
	