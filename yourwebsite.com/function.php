<?php
function showFile($file) {
	global $mime;

	$ext = strtolower(get_ext($file));
	$mimeType = array_search($ext, $mime);
	header('Content-type: ' . $mimeType);
    header('Expires: 0');
	header('Cache-Control: must-revalidate');

	ob_clean();
	flush();

    // Send the image
	readfile($file);
}

function get_ext($image)
{
    $explode = explode('.', $image);
    return end($explode);
}
?>