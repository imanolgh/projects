<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
Home
<br><br>

<form action="logout.php" method = POST>
        <input type="submit" value="Logout" id = "button1">
</form>

<br><br>
Make a Post
<br><br>

<form action="post.php" method = POST>
    <label for="title">Title:</label>
    <input type="title" id="title" name="title">
    <br><br>
    <label for="body"> Body:</label>
    <input type="body" id="body" name="body">
    <br><br>
    <label for="link">Link:</label>
    <input type="link" id="link" name="link">
    <br><br>
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
    <input type="submit" value="Create a Post" id = "button2">
</form>

<br><br>
View Posts
<br><br>

<form action="view_post.php" method = POST>
    <input type="submit" value="View Post" id = "button3">
</form>

<br><br>
Comment Section
<br><br>

<form action="view_comments.php" method = POST>
        <input type="submit" value="travel to the comment section" id = "button4">
</form>

<br><br>
Remove a user --- You can only remove yourself.... unless you're an admin ;) 
<br><br>

<form action="remove_user.php" method = POST>
    Enter the user to be removed: <input type="delete_user" name="delete_user" id = "delete_user">
    
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
    <input type="submit" value="Remove this user" id = "button5">
    <br><br>
</form>


    
</body>
</html>
