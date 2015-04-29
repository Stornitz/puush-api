<?php
define('puush', '');
require_once 'config.php';
require_once 'func.php';

$e = get_post_var('e');
$p = get_post_var('p');

$sha1 = sha1($e.':'.$p);

if(array_key_exists($sha1, $accounts)) {
	$api_key = $accounts[$sha1];
	echo '1,'.$api_key.',,0';
} else {
	echo '-1';
}