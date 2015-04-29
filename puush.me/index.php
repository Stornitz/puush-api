<?php
if(isset($_GET['e404'])) {
	require_once('config.php');

	header('Location: ' . $redirect_url);
}