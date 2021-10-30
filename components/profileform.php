<?php
$username = isset($_POST['new-username']) ? $_POST['new-username'] : $_SESSION['username'];
$firstname = isset($_POST['new-firstname']) ? $_POST['new-firstname'] : $_SESSION['firstname'];
$lastname = isset($_POST['new-lastname']) ? $_POST['new-lastname'] : $_SESSION['lastname'];
?>
<html>

<head>
	<link rel="stylesheet" href="css/form.css">
</head>

<body>
	<div id="profile">
		<header>
			<h1 class="title">Update Profile</h1>
		</header>
		<p>
			Update your account information and<br>
			introduce your password to confirm.
		</p>
		<form action="./resources/updateprocess.php" method="post">
			<div class="form-group">
				<input type="text" name="new-username" minlength="5" maxlength="20" placeholder="Enter new Username" value="<?php echo $username; ?>">
			</div>

			<div class="form-group">
				<input type="text" name="new-lastname" minlength="2" maxlength="20" placeholder="Enter new Lastname" value="<?php echo $lastname; ?>">
			</div>

			<div class="form-group">
				<input type="text" name="new-firstname" minlength="2" maxlength="20" placeholder="Enter new Firstname" value="<?php echo $firstname; ?>">
			</div>

			<div class="form-group">
				<input type="password" name="new-password" minlength="5" maxlength="20" placeholder="Enter new Password" autocomplete="new-password">
			</div>

			<div class="form-group">
				<input type="password" name="password" minlength="5" maxlength="20" placeholder="Enter current Password" required>
			</div>

			<div class="btn-group">
				<button type="submit" class="btn"><span>Update</span></button>
				<button type="reset" class="btn"><span>Reset</span></button>
			</div>
		</form>
	</div>
</body>

</html>