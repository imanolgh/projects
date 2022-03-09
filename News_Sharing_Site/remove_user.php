<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Remove User</title>
</head>
<body>
<?php
// Use a prepared statement
session_start();
require 'connectdatabase.php';
$delete_name = $_POST['delete_user'];
$current_user = $_SESSION['user_id'];
(int) $count = 0;

$stmt = $mysqli->prepare("SELECT COUNT(*) from credentials where username = ?");

if(!$stmt){
 	printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
}

$stmt->bind_param('s', $delete_name);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close(); 

if($count == 0 && $current_user != 'Admin'){
     echo "You Are not this person! You may not delete them!";
}
else if($current_user!='Admin' && $delete_name == 'Admin'){
    echo "You have no power little one... you can never remove the admin!!!";
}
else if ($current_user == 'Admin' && $delete_name == 'Admin'){
    echo "You're the Admin... you can't remove yourself. Everyone else is fair game!";
}
else{
$stmt2 = $mysqli->prepare("DELETE from credentials where username = ?");
if(!$stmt2){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt2->bind_param('s', $delete_name);

$stmt2->execute();

$stmt2->close();

echo "This user has been deleted";
}
?>

<form action="login.html" method = POST>
        <input type="submit" value="Return to Login" id = "button">
</form>
    
</body>
</html>