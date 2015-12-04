<?php

session_start();

if (isset($_POST['host']) && isset($_POST['nonce']) &&
	isset($_SESSION['nonce']) && $_SESSION['nonce'] === $_POST['nonce']) {
	header('Content-Type: text/plain');
	system("traceroute $_POST[host]");
	unset($_SESSION['nonce']);
} else {
	$_SESSION['nonce'] = base64_encode(openssl_random_pseudo_bytes(12));
	echo str_replace('%NONCE%', $_SESSION['nonce'],
		file_get_contents('traceroute.html'));
}

?>
