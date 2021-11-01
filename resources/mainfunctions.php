<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<?php
function active_when(string $pages)
{
	foreach (explode("|", $pages) as $page) {
		if (str_contains($_SERVER['SCRIPT_NAME'], "/$page.php")) {
			return 'class="active"';
		}
	}
}

function hidden_when(string $pages)
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

function implode_keys_values(string $separator = "", array $array)
{
	return implode($separator, array_map(
		function ($k, $v) {
			return "$k = $v";
		},
		array_keys($array),
		$array
	));
}

function toast($page, $type, $message, $time = 2000)
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