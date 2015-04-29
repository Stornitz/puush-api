<?php
/** 
 * Website config
 */

$path_to_puushme_dir = '/path/to/puush.me/';

$website_api_key = '___API_KEY___';

$twitter_account = 'YourAccount';

/**
 * Puush config
 */

require_once($path_to_puushme_dir . 'config.php');

$redirect_url = $redirect_urls[$website_api_key];
$upload_dir = $upload_dirs[$website_api_key];
$formated_url = $formated_urls[$website_api_key];