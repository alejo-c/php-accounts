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
		if ($page == "LOGGED" and isset($_SESSION['id'])) {
			return 'class="hidden"';
		}
		if ($page == "UNLOGGED" and !isset($_SESSION['id'])) {
			return 'class="hidden"';
		}
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

function toast($page, $type, $message, $time = 3000)
{
	echo '
	<script>
		const Toast = Swal.mixin({
			toast: true,
			position: "center-end",
			showConfirmButton: false,
			timer: "' . $time . '",
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener("mouseenter", Swal.stopTimer)
				toast.addEventListener("mouseleave", Swal.resumeTimer)
			}
		});
	
		Toast.fire({
			icon: "' . $type . '",
			title: "' . $message . '"
		}).then((result)=>{
			window.location.href = "' . $page . '";
		});
	</script>';
}
?>