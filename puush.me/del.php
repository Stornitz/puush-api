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
if(!array_key_exists($k, $upload_dirs))
{
	exit ('ERR Invalid account');
}

$upload_dir = $upload_dirs[$k];
$imageSrc = getFileByTimeStamp($upload_dir, $i, 5);
if($imageSrc == null)
{
	exit("ERR Image inexistante.");
}

unlink($imageSrc);
echo 'ok';
?>