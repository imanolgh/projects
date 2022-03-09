<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Post</title>
</head>
<body>
<?php
// Use a prepared statement
session_start();
require 'connectdatabase.php';
$edit_name = $_POST['edit_comment_title'];
$current_user = $_SESSION['user_id'];
$new_comment = $_POST['new_comment'];
(int) $count = 0;

$stmt = $mysqli->prepare("SELECT COUNT(*) from comment where user_id = ? AND comment_name = ?");

if(!$stmt){
 	printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
}

$stmt->bind_param('ss', $current_user, $edit_name);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if($count == 0 && $current_user != 'Admin'){
     echo "This is not your comment or it does not exist";
}

else{
$stmt2 = $mysqli->prepare("update comment set body = ? where comment_name = ?");
if(!$stmt2){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt2->bind_param('ss', $new_comment, $edit_name);

$stmt2->execute();

$stmt2->close();

echo "Your comment has been edited";
}
?>

<form action="view_comments.php" method = POST>
        <input type="submit" value="Return to Comments" id = "button">
</form>
    
</body>
</html>