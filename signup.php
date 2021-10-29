<?php
session_start();
if (isset($_SESSION['id'])) {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign up</title>
	<link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/main.css">
</head>

<body class="wrapper">
	<header>
		<?php include_once("./components/navbar.php"); ?>
	</header>

	<main>
		<?php
		require_once("./resources/functions.php");
		include_once("./components/signupform.html");

		if (isset($_GET['type'])) {
			toast("signup.php", $_GET['type'], $_GET['message']);
		}
		?>
	</main>
</body>

</html>