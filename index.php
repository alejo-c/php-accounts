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
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/1738/1738691.png" type="image/x-icon">
	<link rel=" stylesheet" href="css/main.css">
</head>

<body class="wrapper">
	<header>
		<?php include_once "components/navbar.php" ?>
	</header>

	<main>
		<?php
		if (isset($_SESSION['id'])) {
			$firstname = $_SESSION['firstname'];
			$lastname = $_SESSION['lastname'];
			echo "<div class='box'>Welcome $firstname $lastname.</div>";
		} else {
			echo "<div class='box'>Welcome, Please Log into your account.</div>";
		}

		if (isset($_GET['message'])) {
			toast(".", $_GET['type'], $_GET['message']);
		}
		?>
	</main>
</body>

</html>