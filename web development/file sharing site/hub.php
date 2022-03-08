<!DOCTYPE html>
<html lang = "en">
<head>
	<title>IS File Service</title>
</head>
<body>
	Welcome to your file system!
	<br><br>

						<!---              View Files                ---> 
	Here are your files:
	<br><br>

	<?php
		session_start();

		$username = $_SESSION['username'];
		$view_path = sprintf("/srv/uploads/%s", $username);

		$files = scandir($view_path);

		for ($i = 2; $i < count($files); $i++){
			print_r($files[$i]);
			echo nl2br("\n");
		}
	?>

						<!---              Upload Files                ---> 
						<!---This code was taken from the course wiki for php --->
	<form enctype="multipart/form-data" action="uploadFile.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload (no spaces in name):</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
	</form>

						<!---              Open Files                --->
	<form action = openFile.php method = get>
		Open File<input type = "text" id = "openFile" name ="openFile"/>
		<input type = "submit" value= "Search/Open"/>
	</form>

	<br><br>

						<!---              Delete Files                --->
	<form action = deleteFile.php method = get>
		Delete File<input type = "text" id = "deleteFile" name ="deleteFile"/>
		<input type = "submit" value= "Delete File"/>
	</form>

	<br><br>

							<!---              Rename Files                --->
<!-- 	<form action = fileTransfer.php method = get>
		Trasnfer File to Different user (enter other users' username) <input type = "text" id = "transferUser" name ="transferUser"/>
		Enter File Name You want to transfer <input type = "file" id = "transferFile" name ="transferFile"/>
		<input type = "submit" value= "submit"/>
	</form> -->


	<form action = rename.php method = get>
		File to Rename<input type = "text" id = "openFile" name ="openFile"/>
		New Name <input type = "text" id = "newName" name ="newName"/>
		<input type = "submit" value= "submit"/>
	</form>

	<br><br>

	<form action = login.html method = get>
		<input type = "submit" value= "Logout"/>
	</form>



</body>
</html>