<?php
require_once("./resources/functions.php")
?>

<html>

<head>
	<link rel="stylesheet" href="css/navbar.css">
</head>

<body>
	<nav class="main-nav">
		<ul class="nav-start">
			<li <?php echo active_when("index"); ?>>
				<a href="index.php" class="nav-item">Home</a>
			</li>
		</ul>
		<ul class="nav-end">
			<li <?php echo active_when("login"); ?>>
				<a href="login.php" class="nav-item">Login</a>
			</li>

			<li <?php echo active_when("signup"); ?>>
				<a href="signup.php" class="nav-item">Sign up</a>
			</li>

			<li <?php echo active_when("profile"); ?>>
				<a class="nav-item">Profile</a>
			</li>

			<li>
				<a class="nav-item">log out</a>
			</li>
		</ul>
	</nav>
</body>

</html>