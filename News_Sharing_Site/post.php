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
$post_user = $_SESSION['user_id'];
$post_title = $_POST['title'];
$post_body = $_POST['body'];
$post_link = $_POST['link'];

$stmt = $mysqli->prepare("insert into stories (title, body, link, user_id) values (?,?,?,?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('ssss', $post_title, $post_body, $post_link, $post_user);
$stmt->execute();
$stmt->close();

echo "Your post was successful!";

?>

<br><br>

<form action="home.php" method = POST>
        <input type="submit" value="return home" id = "button">
</form>
    
</body>
</html>
