<?php
session_start();
require_once 'dbfunctions.php';

$username = $_SESSION['username'];
$password = md5($_POST['password']);

$result = select(
	'users',
	['username'],
	['username' => $username, 'password' => $password]
);

if ($result->num_rows > 0) {
	$update_fields = [];

	$new_username = $_POST['new-username'];
	$new_password = $_POST['new-password'];
	$new_firstname = $_POST['new-firstname'];
	$new_lastname = $_POST['new-lastname'];

	if ($_SESSION['username'] != $new_username) {
		$update_fields['username'] = $new_username;
	}
	if ($new_password) {
		$update_fields['password'] = md5($new_password);
	}
	if ($_SESSION['firstname'] != $new_firstname) {
		$update_fields['firstname'] = $new_firstname;
	}
	if ($_SESSION['lastname'] != $new_lastname) {
		$update_fields['lastname'] = $new_lastname;
	}

	if ($update_fields != []) {
		date_default_timezone_set('America/Bogota');
		$update_fields['modification_datetime'] = date('Y-m-d H:i:s');

		update('users', $update_fields, ['username' => $username]);	

		if ($result) {
			$_SESSION['username'] = $new_username;
			$_SESSION['firstname'] = $new_firstname;
			$_SESSION['lastname'] = $new_lastname;

			header('Location: ../../?type=success&message=Account updated successfully');
		} else {
			header('Location: ../../profile.php?type=error&message=Error at update');
		}
	} else {
		header('Location: ../../profile.php?type=info&message=Nothing updated');
	}
} else {
	header('Location: ../../profile.php?type=error&message=Wrong password');
}
