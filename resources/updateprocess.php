<?php
session_start();
require_once("functions.php");

$username = $_SESSION["username"];
$password = md5($_POST["password"]);

$conn = connectDB();

$query = "select username, password, role, firstname, lastname from user where username='$username' and password='$password';";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$columns = array();
	$updated = false;

	$new_username = $_POST['new-username'];
	$new_password = $_POST['new-password'];
	$new_firstname = $_POST['new-firstname'];
	$new_lastname = $_POST['new-lastname'];

	if ($_SESSION['username'] != $new_username) {
		$updated = true;
		$columns['username'] = "username = '$new_username'";
	}
	if ($new_password) {
		$updated = true;
		$columns['password'] = "password = '" . md5($new_password) . "'";
	}
	if ($_SESSION['firstname'] != $new_firstname) {
		$updated = true;
		$columns['firstname'] = "firstname = '$new_firstname'";
	}
	if ($_SESSION['lastname'] != $new_lastname) {
		$updated = true;
		$columns['lastname'] = "lastname = '$new_lastname'";
	}

	if ($updated) {
		date_default_timezone_set("America/Bogota");
		$new_date = date("Y-m-d H:i:s");
		$query = "update user set " . implode(",", $columns) . ",modification_datetime='$new_date' where username='$username';";
		echo $query;
		$result = $conn->query($query);

		if ($result) {
			$_SESSION['username'] = $new_username;
			$_SESSION['firstname'] = $new_firstname;
			$_SESSION['lastname'] = $new_lastname;

			header("Location: ../?type=success&message=Account updated successfully");
		} else {
			header("Location: ../profile.php?type=error&message=Unknown error at update");
		}
	} else {
		header("Location: ../profile.php?type=info&message=Nothing updated");
	}
} else {
	header("Location: ../profile.php?type=error&message=Wrong password");
}

disconnectDB($conn);
