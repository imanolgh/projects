<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
 <?php

session_start();
require 'connectdatabase.php';
$stmt = $mysqli->prepare("SELECT stories.title, stories.body, stories.link, stories.user_id from stories");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->execute();
$stmt->bind_result($post_title, $post_body, $post_link, $post_user);

while ($stmt -> fetch()) {
    printf("%s\n", "Title: " . htmlspecialchars($post_title));
    printf('<br><br>');
    printf("%s\n", "Body: " . htmlspecialchars($post_body));
    printf('<br><br>');
    printf("%s\n", "Link: " . htmlspecialchars($post_link));
    printf('<br><br>');
    printf("%s\n", "User who posted this story: " . htmlspecialchars($post_user));
    printf('<br><br>');
    printf('<br><br>');
    printf('<br><br>');
}
$stmt -> close();


?>

<form action="view_comments.php" method = POST>
    <input type="submit" value="Travel to the comment section" id = "button1">
</form>

<br>
OR MAKE A COMMENT
<br><br>

<form action="comment.php" method = POST>
    Enter the exact title of a post you would like to comment on: <input type="comment_title" name="comment_title" id = "comment_title">
    <br><br>
    <label for="comment_name">The title of YOUR comment?:</label>
    <input type="comment_name" id="comment_name" name="comment_name">
    <br><br>
    <label for="comment">What would you like to comment?:</label>
    <input type="comment" id="comment" name="comment">
    
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
    <input type="submit" value="Submit Comment" id = "button2">
    <br><br>
</form>

<br><br>
DELETE A POST 
<br><br>

<form action="delete_post.php" method = POST>
    Enter the exact title of a post that is YOURS that you would to delete: <input type="delete_post_title" name="delete_post_title" id = "delete_post_title">
    
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
    <input type="submit" value="Delete Post" id = "button3">
    <br><br>
</form>
EDIT A POST
<br><br>
<form action="edit_post.php" method = POST>
    Enter the exact title of a post that is YOURS that you would to edit: <input type="edit_post_title" name="edit_post_title" id = "edit_post_title">
    <br><br>
    <label for="new_post">Enter edited post:</label>
    <input type="new_post" id="new_post" name="new_post">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
    <input type="submit" value="Edit Post" id = "button4">
    <br><br>
</form>

<form action="home.php" method = POST>
        <input type="submit" value="return home" id = "button5">
</form>

</body>
</html>
