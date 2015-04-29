<?php
define("puush", "");
require_once 'func.php';
require_once 'function.php';

$k = get_post_var('k');
if(!array_key_exists($k, $upload_dir))
{
	exit ('ERR Invalid account');
}

$upload_dir = $upload_dirs[$k];
$formated_url = $formated_urls[$k];

if(isset($_GET['del'])) {
	$i = get_post_var('i');
	if(empty($i)) {
		exit("ERR No file provided.");
	}

	$imageSrc = getFileByTimeStamp($upload_dir, $i, 5);
	if($imageSrc == null) {
		exit("ERR Image inexistante.");
	}

	unlink($imageSrc);
}

$cmd = 'ls '.$upload_dir.'*.* -t | head -5';
$output = shell_exec($cmd);
$files = preg_split('/\s+/', trim($output));

echo "0\n";

foreach ($files as $file) {
	$file = basename(trim($file));

	$data = explode('.', $file);
	$id = $data[0];
	$ext = $data[1];

	$imageSrc = sprintf($formated_url, $id);

	$time = filemtime($upload_dir.$file);

	$vues = 42;

	echo $time.",".date("d-m-y H:i", $time).",".$imageSrc.",ss (".date("d-m-y H:i", $time).").".$ext.",".$vues.",0\n";
}
?>