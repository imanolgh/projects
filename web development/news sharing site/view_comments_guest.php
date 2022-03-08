<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Section</title>
</head>
<body>
 <?php
session_start();
require 'connectdatabase.php';
$stmt = $mysqli->prepare("SELECT comment.original_post, comment.comment_name, comment.body, comment.user_id from comment");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->execute();
$stmt->bind_result($comment_title, $comment_name, $comment_body, $comment_user);

while ($stmt -> fetch()) {
    printf("%s\n", "Original Post title: " . htmlspecialchars($comment_title));
    printf('<br><br>');
    printf("%s\n", "Comment title: " . htmlspecialchars($comment_name));
    printf('<br><br>');
    printf("%s\n", "Body: " . htmlspecialchars($comment_body));
    printf('<br><br>');
    printf("%s\n", "User who posted this comment: " . htmlspecialchars($comment_user));
    printf('<br><br>');
    printf('<br><br>');
    printf('<br><br>');
}
$stmt -> close();

 ?>  

<form action="logout.php" method = POST>
        <input type="submit" value="Logout" id = "button">
</form> 

<br><br>

<form action="view_posts_guest.php" method = POST>
        <input type="submit" value="Return to Posts" id = "button">
</form> 

 </body>
</html>