<!DOCTYPE html>
<html lang = "en">
<head>
	<title>IS File Service</title>
</head>

<body>

<form  action= "hub.php" method="get">
	<input type="submit" value="Return to Hub"/>
</form> 

<?php
session_start();

$filename = $_GET['openFile'];
// We need to make sure that the filename is in a valid format; if it's not, display an error and leave the script.
// To perform the check, we will use a regular expression.
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo htmlentities("Invalid filename");
	exit;
}

// Get the username and make sure that it is alphanumeric with limited other characters.
// You shouldn't allow usernames with unusual characters anyway, but it's always best to perform a sanity check
// since we will be concatenating the string to load files from the filesystem.
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo htmlentities("Invalid username");
	exit;
}
$newName = $_GET['newName'];
$full_path = sprintf("/srv/uploads/%s/%s", $username, $filename);
$new_path = sprintf("/srv/uploads/%s/%s", $username, $newName);


if (!(is_null($_GET['newName']))){
	rename($full_path, $new_path);
	echo htmlentities("Successfully Changed Name");
	exit;
}
else {
	echo htmlentities("Failed to Change Name");
	exit;
}
?>
</body>
</html>
