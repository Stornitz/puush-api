<?php

if (!defined('puush')) exit('Bonjour');

// The folder where uploads are stored in
define ('UPLOAD_DIR', '/var/www/uploads/');

// The formatted url to send to the client, where %s is the generated file name
define ('FORMATTED_URL', 'http://img.website.com/%s');

// The max file size, default 250 MB ( 250 * 1024 * 1024 )
define ('MAX_FILE_SIZE', 250 * 1024 * 1024);

// This is your api key, to find it : Open the Puush Settings of the application > Account > API Key
define ('API_KEY', '___');

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

$TwitterMetaData = array('site' => '@Account',
                        'creator' => '@Account',
                        'title' => 'Screenshoot')

// From http://whois.arin.net/rest/org/TWITT/nets
$TwitterIPs = Array(Array("199.96.56.0", "199.96.63.255"),
                    Array("199.59.148.0", "199.59.151.255"),
                    Array("199.16.156.0", "199.16.159.255"),
                    Array("192.133.76.0", "192.133.79.255"));