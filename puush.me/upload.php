<?php
define('puush', '');
require_once 'func.php';
require_once 'function.php';

// API - KEY
$k = get_post_var('k');
if(!array_key_exists($k, $upload_dirs))
{
	exit ('ERR Invalid account');
}

$c = get_post_var('c');
// Check for the file
if (!isset($_FILES['f']))
{
    exit ('ERR No file provided.');
}

// The file they are uploading
// ?
$file = $_FILES['f'];

// Check the size, max 250 MB
if ($file['size'] > MAX_FILE_SIZE)
{
    exit ('ERR File is too big.');
}

// Ensure the image is actually a file and not a friendly virus
if (validate_image($file) === FALSE)
{
    exit ('ERR Invalid image.');
}

$upload_dir = $upload_dirs[$k];

// Generate a new file name
$ext = get_ext($file['name']);
$generated_name = generate_upload_name($ext, $upload_dir);

// Move the file
move_uploaded_file($file['tmp_name'], $upload_dir . $generated_name . '.' . $ext);

// ahem
$formated_url = $formated_urls[$k];
echo '0,' . sprintf($formated_url, $generated_name) . ',-1,-1';
?>