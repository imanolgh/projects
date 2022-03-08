<?php
		session_start();

		$username = $_SESSION['username'];
		$view_path = sprintf("/srv/uploads/%s", $username);

		$files = scandir($view_path);

		for ($i = 2; $i < count($files); $i++){
			print_r($files[$i]);
			echo nl2br("\n");
		}
?>
