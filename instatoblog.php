<?
require_once("app/ig/autoload.php");
$instagram = new \InstagramScraper\Instagram();
$medias    = $instagram->getMedias('_korean_stylee', '300');

				foreach ($medias as $media)
				{
					echo '
      <img src="' . $media['imageHighResolutionUrl'] . '" height="300" widht="300"><br/>
     ';
     }