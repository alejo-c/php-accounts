<?php
session_start();

if (!isset($_SESSION['id'])) {
	header("Location: ../index.php");
}

session_destroy();
header("Location: ../?type=info&message=Logged out successfully");
