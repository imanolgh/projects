<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php

session_start();
require 'connectdatabase.php';
$username = $_POST['username'];
$password = $_POST['password'];

$passwordhash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $mysqli->prepare("insert into credentials (username, password) values (?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('ss', $username, $passwordhash);

$stmt->execute();

$stmt->close();

echo "Thank you for registering!";

?>
<form action = "login.html" method = POST>
        <input type = "submit" value="Return to Login Page" id = "btn" >
        </form>
    
</body>
</html>