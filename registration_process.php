<?php session_start(); 

if(isset($_POST['action']) && $_POST['action']=='register')
{
	register_action();
}
//is the post action set and is the post action == register
//if it is then redirect to register action function
function register_action()
{
	$_SESSION['firstname']=$_POST['firstname'];
	if(empty($_POST['email']))
	{	
		$_SESSION['errors'][] = "Email is required.<br>";
	}
	if(empty($_POST['firstname']))
	{
		$_SESSION['errors'][]= "First Name is required.<br>";
	}
	if(empty($_POST['lastname']))
	{
		$_SESSION['errors'][] = "Last Name is required.<br>";
	}
	if(empty($_POST['password']))
	{
		$_SESSION['errors'][] = "Password is required.<br>";
	}
	if(empty($_POST['confirm']))
	{
		$_SESSION['errors'][] = "Password Confirmation required.<br>";
	}
	if(empty($_POST['birthdate']))
	{
		$_SESSION['errors'][]= "Birthdate required.<br>";
	}
	else
	{
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$_SESSION['errors'][] = "email is not valid";
		}
		if($_POST['password'] !=$_POST['confirm'])
		{
			$_SESSION['errors'][] = "Passwords do not match.";

		}
	}
		if($_FILES['profile_picture']['errors']==0)//????
		{
			$directory = 'Uploads/';
			$file_name=$_FILES['profile_picture']['name'];
			$file_path= $directory.$file_name;


			if(!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $file_path))
			{
				$_SESSION['errors'][]= $file_name . "could not be saved.<br>";
			}
			$_SESSION['profile_picture']=$file_path;
		}
		if(count($_SESSION['errors']) ==0)//???
		{
			header('Location: success.php');
		}
		else
			{
				header('Location: registration.php');
			}
			
	}






?>