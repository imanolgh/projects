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
Delete A Comment
<form action="delete_comment.php" method = POST>
    Enter the exact title of a comment that is YOURS that you would to delete: <input type="delete_comment_title" name="delete_comment_title" id = "delete_comment_title">

    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
    <input type="submit" value="Delete Comment" id = "button">
    <br><br>
</form>
<br><br>
EDIT A COMMENT
<br><br>
<form action="edit_comment.php" method = POST>
    Enter the exact title of a comment that is YOURS that you would to edit: <input type="edit_comment_title" name="edit_comment_title" id = "edit_comment_title">
    <br><br>
    <label for="new_comment">Enter edited comment:</label>
    <input type="new_comment" id="new_comment" name="new_comment">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
    <input type="submit" value="Edit Comment" id = "button">
    <br><br>
</form>
<form action="home.php" method = POST>
        <input type="submit" value="return home" id = "button">
</form>

<br><br>

<form action="view_post.php" method = POST>
        <input type="submit" value="return to posts" id = "button">
</form>

</body>
</html>