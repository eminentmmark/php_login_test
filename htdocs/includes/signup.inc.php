<?php

//when we check for '$_POST', we are checking for data inside the url that we cant see.
//when we check for '$_GET', we are checking for data inside the url that we can see ie:'http://localhost/signup.php?error=none'
if (isset($_POST['signup-submit'])) // checks if user did click the signup button inside the signup form
{

	//gives access to the variable 'conn'
	require 'dbh.inc.php';

	//fetching data entered by user in the form
	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

	//error handlers for checking if users made a mistake signing up
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		//code to check if any of the fields are empty
		//the header has message to be displayed
		header("location: ../signup.php?error=emptyfields&uid=".$username."$mail=".$email);
		//stops the code from running once there's an empty field
		exit();
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("location: ../signup.php?error=invalidmailuid");
		exit();
	}
	elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("location: ../signup.php?error=invalidmail&mail=".$email);
		exit();
	}
	elseif ($password !== $passwordRepeat) {
		header("location: ../signup.php?error=passwordcheck&uid=".$username."&mail=",$email);
		exit();
	}
	else {
		//creating prepared statements to prevent users from destroying the db through the forms typing in mysql code by adding the '?'
		$sql = "SELECT uidUsers from users where uidUsers=?";
		$stmt = mysqli_stmt_init($conn);
		//checkin if the statements '$sql' and '$stmt' fails 
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../signup.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0){
				header("location: ../signup.php?error=usertaken&mail=".$email);
				exit();
			}
			else {

				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
				//we are creating prepared statments to make it more secure - preventing any sort of code from being injected into the database
				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("location: ../signup.php?error=sqlerror");
					exit();
				}
				else{
					//hashing passwords inserted by new user
					$hashedpwd = password_hash($password, PASSWORD_DEFAULT);

					//passing in data from the new user - BINDING PARAMETERS TO THE SQL STATMENT "$sql" ABOVE. THE "ss" FOR THE NUMBER OF PARAMETERS (EACH s FOR EACH PARAMETER)
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
					mysqli_stmt_execute($stmt);
					//signup success message 
					header("location: ../signup.php?signup=success");
					exit();	
				}
				
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else //sends them back to the signup page 
{
	header("location: ../signup.php");
	exit();
}