<?php
// The max file size, default 250 MB ( 250 * 1024 * 1024 )
define ('MAX_FILE_SIZE', 250 * 1024 * 1024);

// Mime types
$mime = array('image/gif' => 'gif',
    'image/jpeg' => 'jpeg',
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/psd' => 'psd',
    'image/bmp' => 'bmp',
    'image/tiff' => 'tiff',
    'image/tiff' => 'tiff',
    'image/jp2' => 'jp2',
    'image/iff' => 'iff',
    'image/vnd.wap.wbmp' => 'bmp',
    'image/xbm' => 'xbm',
    'image/vnd.microsoft.icon' => 'ico');

// Extension whitelist
$image_whitelist = array('jpg', 'jpeg', 'png', 'gif','bmp');

// Ips de twitter pour générer les meta
// Source: http://whois.arin.net/rest/org/TWITT/nets
$TwitterIPs = Array(Array("199.96.56.0", "199.96.63.255"),
                    Array("199.59.148.0", "199.59.151.255"),
                    Array("199.16.156.0", "199.16.159.255"),
                    Array("192.133.76.0", "192.133.79.255"),
                    Array("104.244.40.0", "104.244.47.255"));
                    
define('TWITTER_IP', serialize($TwitterIPs));

// Si le puush n'existe pas
$redirect_urls = array('___API_KEY___' => 'https://twitter.com/YourAccount');

/**
 * Accounts
 */

// ___AUTH_HASH___      <=>     sha1($user.':'.$password);
// $user & $password    <=>     Username et mot de passe dans l'appli puush, vous n'êtes pas obligé d'utiliser le vrai
$accounts = array('___AUTH_HASH___' => '___API_KEY___');

// Dossier d'upload
$upload_dirs = array('___API_KEY___' => '/path/to/yourwebsite.com/uploads/');

// Format des urls copiées dans le clipboard
$formated_urls = array('___API_KEY___' => 'http://yourwebsite.com/%s');

?>