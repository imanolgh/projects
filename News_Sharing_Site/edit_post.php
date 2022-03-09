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
$edit_name = $_POST['edit_post_title'];
$current_user = $_SESSION['user_id'];
$new_post = $_POST['new_post'];
(int) $count = 0;

$stmt = $mysqli->prepare("SELECT COUNT(*) from stories where user_id = ? AND title = ?");

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
     echo "This is not your post or it does not exist";
}

else{
$stmt2 = $mysqli->prepare("update stories set body = ? where title = ?");
if(!$stmt2){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt2->bind_param('ss', $new_post, $edit_name);

$stmt2->execute();

$stmt2->close();

echo "Your post has been edited";
}
?>

<form action="view_post.php" method = POST>
        <input type="submit" value="Return to Posts" id = "button">
</form>
    
</body>
</html>