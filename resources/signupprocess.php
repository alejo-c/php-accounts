<?php
include_once("functions.php");

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$conn = connectDB();

$query = "insert into user(username, password, firstname, lastname) values('$username', '$password', '$firstname', '$lastname');";
$result = $conn->query($query);

disconnectDB($conn);

if ($result) {
	header("Location: ../index.php?type=success&message=Signed up successfully");
} else {
	header("Location: ../signup.php?type=error&message=Username already exists");
}
