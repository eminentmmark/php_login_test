 <?php

	include_once 'header.php';

?>
			
			<main>
				<div class="wrapper">
					<section class="main">

						<!--says if the user is logged in or out-->
						 <?php

						 	if (isset($_SESSION['userId'])) {
						 		echo '<p class="login-status">You are logged in!</p>';
						 	}
						 	else{
						 		echo'<p class="login-status">You are logged out!</p>';
						 	}

						 ?>				
						
					</section>
				</div>
			</main>

<?php

	include_once 'footer.php';

?>	
