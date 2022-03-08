<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
 <?php
session_start();
session_destroy();
header('Location: login.html');


 ?>


    
</body>
</html>