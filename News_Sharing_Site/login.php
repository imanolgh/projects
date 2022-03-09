<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
// Use a prepared statement
session_start();
require 'connectdatabase.php';
$stmt = $mysqli->prepare("SELECT COUNT(*), username, password FROM credentials WHERE username=?");

// Bind the parameter
$user = $_POST['username'];
$stmt->bind_param('s', $user);
$stmt->execute();

// Bind the results
$stmt->bind_result($cnt, $user_id, $pwd_hash);
$stmt->fetch();

$pwd_guess = $_POST['password'];
// Compare the submitted password to the actual password hash

if($cnt == 1 && password_verify($pwd_guess, $pwd_hash) && $pwd_guess != 'password'){
	// Login succeeded!
    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
	$_SESSION['user_id'] = $user_id;
    header('Location: home.php');
	// Redirect to your target page
} else{
	// Login failed; redirect back to the login screen
    session_destroy();
        echo "Incorrect password, or the user does not exist";
}
?>

<form action="login.html" method = POST>
        <input type="submit" value="Try Again" id = "button">
</form>
    
</body>
</html>