<?php
session_start();
$usrName = $_GET['userName'];

if ($usrName == sfsobol) {
	$_SESSION['username'] = $usrName;
	header("Location: hub.php");
	exit;
}
else if ($usrName == imanolH) {
	$_SESSION['username'] = $usrName;
	header("Location: hub.php");
	exit;
}
else if ($usrName == randomR){
	$_SESSION['username'] = $usrName;
	header("Location: hub.php");
	exit;
}
else{
	echo htmlentities("incorrect username");
}
?>