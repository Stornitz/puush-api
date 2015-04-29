<?php
require_once('site_config.php');
require_once('function.php');

if(!empty($_GET['image'])) {

	$imgReq = urldecode($_GET['image']);

	if(!empty($imgReq) && $imgReq != '') {
			$image = basename($imgReq);

			if(is_file($upload_dir . $image)) {
				showFile($upload_dir . $image);
				exit;
			}

			$matched = glob($upload_dir . $image . '.*');
			if(!empty($matched) && !empty($matched[0])) {
				$matched = $matched[0];
				$ext = strtolower(get_ext($matched));
				$time = filemtime($upload_dir . $image . '.' . $ext);

				if(inTwitterRange($_SERVER["REMOTE_ADDR"]))
				{
					$size = getimagesize($matched);

					// On affiche les meta de twitter pour l'intégration dans les tweets
				?>
					<meta name="twitter:card" content="photo">
					<meta name="twitter:site" content="@<?=$twitter_account?>">
					<meta name="twitter:creator" content="@Stornitz">
					<meta name="twitter:image:width" content="<?=$size[1]?>">
					<meta name="twitter:image:height" content="<?=$size[0]?>">
					<meta name="twitter:image" content="<?=sprintf($formated_url, $image.".".$ext)?>">
					<meta name="twitter:domain" content="<?=sprintf($image)?>">
					<meta name="twitter:title" content="Screenshoot du <?=date("d/m/y", $time)?>  à <?=date("H:i", $time)?>">
					<meta name="twitter:app:name:iphone" content="">
					<meta name="twitter:app:name:ipad" content="">
					<meta name="twitter:app:name:googleplay" content="">
					<meta name="twitter:app:url:iphone" content="">
					<meta name="twitter:app:url:ipad" content="">
					<meta name="twitter:app:url:googleplay" content="">
					<meta name="twitter:app:id:iphone" content="">
					<meta name="twitter:app:id:ipad" content="">
					<meta name="twitter:app:id:googleplay" content="">
					
				<?php
				} else {
					showFile($matched);
				}
				exit;
			}
		}
	}

header('Location: '.$redirect_url);
?>