<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
	<link rel=" stylesheet" href="css/main.css">
</head>

<body>
	<header>
		<?php include_once("./components/navbar.php"); ?>
	</header>

	<main>
		<?php
		require_once("./resources/functions.php");

		if (isset($_SESSION['id'])) {
		} else {
		}

		if (isset($_GET['type'])) {
			toast(".", $_GET['type'], $_GET['message']);
		}
		?>
	</main>
</body>

</html>