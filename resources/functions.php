<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<?php
function active_when($pages)
{
	foreach (explode("|", $pages) as $page) {
		if (str_contains($_SERVER['SCRIPT_NAME'], "/$page.php")) {
			return 'class="active"';
		}
	}
}

function hidden_when($pages)
{
	foreach (explode("|", $pages) as $page) {
		if (str_contains($_SERVER['SCRIPT_NAME'], "/$page.php")) {
			return 'class="hidden"';
		}
	}
}

function connectDB()
{
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "accountsdb";
	return mysqli_connect($hostname, $username, $password, $database);
}

function disconnectDB($connection)
{
	return mysqli_close($connection);
}
?>