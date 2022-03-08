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

	$filename = $_GET['deleteFile'];
	if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
		echo htmlentities("Invalid filename");
		exit;
	}

	$username = $_SESSION['username'];
	if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo htmlentities("Invalid username");
	exit;
	}

	$full_path = sprintf("/srv/uploads/%s/%s", $username, $filename);

	if (unlink($full_path)){
		echo htmlentities("File Successfuly Deleted.");
	}
	else{
		echo htmlentities("File could not be found.");
	}
?>

</body>
</html>