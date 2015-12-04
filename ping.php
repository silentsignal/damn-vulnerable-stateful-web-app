<?php

session_start();

if (isset($_POST['host']) && isset($_SESSION['count'])) {
	header('Content-Type: text/plain');
	system("ping -c $_SESSION[count] $_POST[host]");
	unset($_SESSION['count']);
} else if (isset($_POST['count'])) {
	$_SESSION['count'] = $_POST['count'];
	readfile('ping2.html');
} else {
	readfile('ping1.html');
}

?>
