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


<form action="view_comments_guest.php" method = POST>
        <input type="submit" value="Travel to Comments" id = "button1">
</form> 

<br><br>

<form action="logout.php" method = POST>
        <input type="submit" value="Logout" id = "button2">
</form>
</body>
</html>
