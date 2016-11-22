	<html>
	<head>
		<title>E library Login</title>
	</head>
	<body>
		<h1> Login </h1>
		<form action="<?php echo base_url(). 'elibrary/index.php/login/login'; ?>" method="post">
			<input type="text" name="username" id="usernameInput" placeholder="username">
			<input type="password" name="username" id="paswordInput" placeholder="password">
			<input type="submit" name="submit" id="submitButton" value="Login">
		</form>
		<?php 
			if(isset($loggedIn)){
				if(!$loggedIn){
					echo "<h1> Wrong pasword";
				}
			}
		?>
	</body>
	</html>