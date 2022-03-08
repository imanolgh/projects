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

//This code was taken from the course wiki for php 

// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo htmlentities("Invalid filename");
	exit;
}

// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo htmlentities("Invalid username");
	exit;
}

$full_path = sprintf("/srv/uploads/%s/%s", $username, $filename);

if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	echo htmlentities("Files successfuly uploaded");
	exit;
}
else{
	echo htmlentities("Fail to upload file");
	exit;
}
?>

</body>
</html>
