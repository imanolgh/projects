<?php
// connect to a MySQL database in php, taken from course wiki

$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'mod3database');

if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}

?>