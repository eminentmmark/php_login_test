<?php 

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="description" content="just_an_example">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<!-- linking the html to the css code-->
	<link rel="stylesheet" href="style.css">

</head>
<body>

	<header>
		
		<section class="header">

			<!---anchor tag that includes the logo--->
			<a href="#">
				<!--linking to the logo in the 'img' file-->
				<img src="img/logo_form.png" alt="logo">
			</a>

			<div class="links">
				<ul>
					<li><a href="index.php">home</a></li>
					<li><a href="#">about me</a></li>
					<li><a href="#">portfolio</a></li>
					<li><a href="#">contact</a></li>

				</ul>
			</div>
		

		<nav>
			<!---including both forms in this html element--->
			<div class="myforms">
				
				<!--creating the form tag-->
				<form action="includes/login.inc.php" method="post">
					<input type="text" name="mailuid" placeholder="Username/Email...">
					<input type="password" name="pwd" placeholder="******">
					<button type="submit" name="login-submit">Login</button>	
				</form>
				<ul>
					<li>
						<a href="signup.php">Signup</a>
					</li>
				</ul>
				<!--basic logout form-->
				<form action="includes/logout.php" method="post">
					<button type="submit" name="logout-submit">Log out</button>	
				</form>

			</div>
		</nav>
		</section>

		
	</header>

</body>
</html>