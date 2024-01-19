<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	body{
		overflow: hidden;
	}

	img{
		margin-left: 60px;
		margin-top: 10px;
	}

	.admin_name{
		margin-left: 40px;
		font-family: arial;
		font-size: 20px;
		font-weight: bold;
	}

	ul{
		list-style-type: none;
		font-size: 22px;
		margin-top: 170px;
		font-family: Arial;
	}

	li a{
		text-decoration: none;
		color: black;
		text-align: center;
	}

	li a:hover{
		display: block;
		background-color: #1C79D5;
		width: 120px;
		height: 32px;
		color: white;
		padding-top: 5px;
		border-radius: 5px;
	}
</style>
<body bgcolor="white">
	<img src="Logo/Admin logo.png">
		<p class="admin_name">
			<?php
				$db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));
				$email = $_GET['email'];
				$sql = mysqli_query($db, "select first_name, last_name from users where email = '$email'");
				$user = mysqli_fetch_array($sql);
				echo $user['first_name'] . "<br>" . $user['last_name'];
			?>
		</p>
		<ul>
			<li>
			<?php
                    if(isset($_GET['logout'])) {
                        session_destroy();
                        header("Location: login.php");
                    }
                ?>
                <a class="nav-link" href="admin_homepage.php?logout" target="_top" onclick="return confirm('Are you sure you want to log out?');">Logout</a>
			</li>
		</ul>
</body>
</html>