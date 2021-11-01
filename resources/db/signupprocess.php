<?php
require_once 'dbfunctions.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$result = insert('users', [
	'username' => $username,
	'password' => $password,
	'firstname' => $firstname,
	'lastname' => $lastname
]);

if ($result) {
	header("Location: ../../?type=success&message=Signed up successfully");
} else {
	header("Location: ../../signup.php?type=error&message=Username already exists");
}
