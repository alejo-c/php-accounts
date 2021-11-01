<?php
session_start();
if (isset($_SESSION['id'])) {
	header('Location: .'); # index.php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/1738/1738691.png" type="image/x-icon">
	<link rel=" stylesheet" href="css/main.css">
</head>

<body class="wrapper">
	<header>
		<?php include_once "components/navbar.php"; ?>
	</header>

	<main>
		<?php
		include_once "components/loginform.html";

		if (isset($_GET['message'])) {
			toast("login.php", $_GET['type'], $_GET['message']);
		}
		?>
	</main>
</body>

</html>