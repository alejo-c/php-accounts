<?php
session_start();
require_once 'dbfunctions.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$result = select(
	'users',
	['role', 'firstname', 'lastname'],
	['username' => $username, 'password' => $password]
);

if ($result->num_rows > 0) {
	$data = $result->fetch_assoc();

	$_SESSION = array(
		'id' => session_id(),
		'username' => $username,
		'role' => $data['role'],
		'firstname' => $data['firstname'],
		'lastname' => $data['lastname']
	);
	header('Location: ../../?type=success&message=Logged in successfully');
} else {
	header('Location: ../../login.php?type=error&message=Wrong username or password');
}
