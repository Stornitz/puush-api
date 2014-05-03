<?php
if(isset($_GET['l']) && isset($_GET['pwd'])) {
	exit('Encrypted Id : '.sha1($_GET['l'].':'.$_GET['pwd']));
}

define('puush', '');
require_once 'config.php';
require_once 'func.php';

$e = get_post_var('e');
$p = get_post_var('p');

echo (in_array(sha1($e.':'.$p), $Accounts)) ? '1,'.API_KEY.',,0' : '-1';