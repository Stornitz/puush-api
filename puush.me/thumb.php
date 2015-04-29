<?php
define("puush", "");
require("function.php");
require("func.php");

$i = get_post_var('i');
if(empty($i))
{
	exit("ERR No file provided.");
}

$k = get_post_var('k');
if(!array_key_exists($k, $upload_dir))
{
	exit ('ERR Invalid account');
}

$upload_dir = $upload_dirs[$k];
$imageSrc = getFileByTimeStamp($upload_dir, $i, 5);
if($imageSrc == null)
{
	exit("ERR Image inexistante.");
}

$ext = explode('.', basename($imageSrc))[1];

if($ext == "png")
{
	$source = imagecreatefrompng($imageSrc);
}
elseif($ext == "jpeg" OR $ext == "jpg")
{
	$source = imagecreatefromjpeg($imageSrc);
}
elseif($ext == "bmp")
{
	$source = imagecreatefromwbmp($imageSrc);
}
elseif($ext == "gif")
{
	$source = imagecreatefromgif($imageSrc);
} else {
	$source = imagecreatetruecolor(100, 100);
}
$thumb = imagecreatetruecolor(100, 100);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_thumb = $hauteur_thumb = 100;

imagecopyresampled($thumb, $source, 0, 0, 0, 0, $largeur_thumb, $hauteur_source, $largeur_source, $hauteur_source);

ob_clean();
header("Content-type: image/jpeg");
imagejpeg($thumb);
?>