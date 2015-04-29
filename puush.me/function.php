<?php
require_once('config.php');

function inTwitterRange($ip)
{
	if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))
	{
		return false;
	}
	
	$ip_long = ip2long($ip);
	
	$inRange = false;
	
	$ips = unserialize(TWITTER_IP);
	
	foreach($ips AS $long)
	{
		if(ip2long($long[0]) <= $ip_long && $ip_long <= ip2long($long[1]))
		{
			$inRange = true;
			break;
		}
	}
	
	return $inRange;
}

function getFileByTimeStamp($dir, $timestamp, $limit) {

	$cmd = 'ls '.$dir.'*.* -t | head -5';
	$output = shell_exec($cmd);
	$files = preg_split('/\s+/', trim($output));

	$i = 0;
	foreach ($files as $file) {
		if(filemtime($file) == $timestamp) {
			return $file;
		}

		if($i >= $limit) {
			$i++;
		}
	}

	return null;
}
?>