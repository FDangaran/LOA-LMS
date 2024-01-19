<?php
session_start();
if(!isset($_GET['email']) || empty($_GET['email'])){
	header("location: login.php");
	exit;
} else {
	$email = $_GET['email'];
echo "
	<!DOCTYPE html>
	<html>
	<head>
		<title>Admin Dashboard</title>
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
		<style type='text/css'>
		</style>
	</head>
		<frameset rows='21%, 70%' border='1' noresize>
			<frame src='Header.php' name=''></frame>
			<frameset cols='17%, *'>
				<frame src='Menu.php?email=$email' name=''></frame>
			<frame src='Body.php' name='body'></frame>
			</frameset>
		</frameset>
	<body>
		<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
		<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
	</body>
	</html>";
}
?>
