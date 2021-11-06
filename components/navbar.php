<?php
require_once './resources/mainfunctions.php';
?>

<link rel="stylesheet" href="css/navbar.css">

<nav class="main-nav">
	<ul class="nav-start">
		<li <?php echo active_when("index"); ?>>
			<a href="." class="nav-item">Home</a>
		</li>
	</ul>
	<ul class="nav-end">
		<li <?php echo active_when("login");
			echo hidden_when("LOGGED"); ?>>
			<a href="login.php" class="nav-item">Login</a>
		</li>

		<li <?php echo active_when("signup");
			echo hidden_when("LOGGED"); ?>>
			<a href="signup.php" class="nav-item">Sign up</a>
		</li>

		<li <?php echo active_when("profile");
			echo hidden_when("UNLOGGED"); ?>>
			<a href="profile.php" class="nav-item">Profile</a>
		</li>

		<li <?php echo hidden_when("UNLOGGED"); ?>>
			<a href="resources/db/logoutprocess.php" class="nav-item">log out</a>
		</li>
	</ul>
</nav>