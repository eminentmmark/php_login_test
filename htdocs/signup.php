<?php

	include_once 'header.php';

?>
			
			<main>
				<div class="wrapper">
					<section class="main">
						<h1>Sign up</h1>

						<form action="includes/signup.inc.php" method="post">
							<input type="text" name="uid" placeholder="Username">
							<input type="text" name="mail" placeholder="E-mail">
							<input type="text" name="pwd" placeholder="Password">
							<input type="text" name="pwd-repeat" placeholder="Repeat password">
							<button type="submit" name="signup-submit">Signup</button>
						</form>
						
					</section>
				</div>
			</main>

<?php

	include_once 'footer.php';

?>	