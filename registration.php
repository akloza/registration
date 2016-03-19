<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Registration Assignment</title>
	
</head>

<style>
#container{
	width:900px;
	background-color: rgb(138, 161, 179);
}
</style>

<body>
<?php 
	if(isset($_SESSION['errors']))
	{
		foreach($_SESSION['errors'] as $error)
		{
			echo $error;
		}
	}
 ?>
	<div id="container">
		<h2>Register here..</h2>
		<form action="registration_process.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">

			<input type="hidden" name="action" value="register">
			<!--this input will be used to process the info that will allow the user to register
			named it action to call in function in process page and I called the value register 
			because it will allow the user to register-->
			<label for="email">Email:</label>
			<input id="email" type="text" name="email" placeholder="youremail@domain.com"><br>

			<label for="firstname">First Name:</label>
			<input id="firstname" type="text" name="firstname" placeholder="John"><br>
						
			<label for="lastname">Last Name:</label>
			<input id="firstname" type="text" name="lastname" placeholder="Smith"><br>
			
			<label for="password">Password:</label>
			<input id="password" type="password" name="password" placeholder="Enter a password"><br>
			
			<label for="confirm">Confirm Password:</label>
			<input id="password confirmaton" type="password" name="confirm" placeholder="Confirm password"><br>
			
			<label for"birthdate">Birth Date:</label>
			<input id="birthdate" type="text" name="birthdate" placeholder="MM/DD/YY"><br>

			<label for="profile">Profile Picture</label>
			<input type="file" name="profile_picture"> <br>
			<input type="submit" value="Register">
			<input type="reset" value="Reset Form">
		</form>
	</div>
<?php 
	$_SESSION['errors']=array();
	
 ?>
</body>
</html>