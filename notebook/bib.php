<?php

	// Function for the register form
	function registerForm() {
		$register = 
			'<div class="register-login" id="registerbox">
			
				<a href="#" class="closebutton" id="closebutton1"><img src="img/closebutton.png" alt="Close"/></a>

				<h2>~Register~</h2>
		
				<form method="POST" action="php_library/new_user.php">
					<p>Username</p>
					<input type="text" name="username" required>
							
					<p>Email</p>
					<input type="email" name="email" required>
							
					<p>Password</p>
					<input id="password" type="password" name="password" required>
							
					<input class="submit-button icon-arrow-right" type="submit" name="submit" value="Register">
				</form>
			</div>';

		return $register;
	}
	return registerForm();

	// Function for the loginform
	function loginForm() {
		$login = '<div class="register-login" id="loginbox">
			
			<a href="#" class="closebutton" id="closebutton2"><img src="img/closebutton.png" alt="Close"/></a>
			
			<h2>~Login~</h2>
	
			<form method="POST" action="php_library/login.php">
				<p>Email</p>
				<input type="text" name="email" required>
				
				<p>Password</p>
				<input type="password" name="password" required>
				
				<input class="submit-button icon-arrow-right" type="submit" name="submit" value="Login">
			</form>
		</div>';

		return $login;
	}
	return loginForm();
	
?>	