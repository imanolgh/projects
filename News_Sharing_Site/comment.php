<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment</title>
</head>
<body>

 <?php
 session_start();
 require 'connectdatabase.php';

$comment_user = $_SESSION['user_id'];
$post_for_comment = $_POST['comment_title'];
$comment_body = $_POST['comment'];
$comment_name = $_POST['comment_name'];

$stmt = $mysqli->prepare("insert into comment (original_post, comment_name, body, user_id) values (?,?,?,?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('ssss', $post_for_comment, $comment_name, $comment_body, $comment_user);
$stmt->execute();
$stmt->close();

echo "Your comment was successfully submitted!";

?>
<br><br>

<form action="view_comments.php" method = POST>
        <input type="submit" value="return to comment section" id = "button1">
</form>

<form action="home.php" method = POST>
        <input type="submit" value="return home" id = "button2">
</form>

    
</body>
</html>
