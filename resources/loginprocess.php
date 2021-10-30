<?php
session_start();
require_once("functions.php");

$username = $_POST["username"];
$password = md5($_POST["password"]);

$conn = connectDB();

$query = "select username, password, role, firstname, lastname from user where username='$username' and password='$password';";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();

	$_SESSION = array(
		'id' => session_id(),
		'username' => $username,
		'role' => $row['role'],
		'firstname' =>  $row['firstname'],
		'lastname' => $row['lastname']
	);

	header("Location: ../?type=success&message=Logged in successfully");
} else {
	header("Location: ../login.php?type=error&message=Wrong username or password");
}

disconnectDB($conn);
