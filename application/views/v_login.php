<!DOCTYPE html>
<html>	
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/login-style.css">
		<title>
			Login
		</title>
	</head>
	<body>
		<div class="container">
		    <div class="row">
		    <br>
		    <br>
		    <br>
		    <br>
		    <br>
		        <div class="col-md-offset-5 col-md-4">
		            <div class="form-login">
		            	<div id="subtitle">
		            		LOGIN PERPUSTAKAAN
		            	</div>
            			<form action="<?php echo base_url(). 'PPWE_1/index.php/login/login'; ?>" method="post">
			            	<input type="text" pattern="^[_A-z0-9]{1,}$" id="userName" class="form-control input-sm chat-input" placeholder="username" name="username"  required oninvalid="this.setCustomValidity('Username tidak valid)"/>
			            	<br>
			            	<input type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" name="password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')"/>
			            	<br>
			            	<div class="wrapper">
			            		<span class="group-btn">
	            					<input type="submit"  class="btn btn-primary btn-md" name="submit" id="submitButton" value="Login">
			            		</span>
			            		<span class="group-btn">     
			                		<a href="<?php echo base_url();?>PPWE_1/index.php/dashboard" class="btn btn-primary btn-md"> Melihat Buku</a>
			            		</span>
			            	</div>
		            	</form>
		            </div>
		        </div>
		    </div>
		</div>
		<script>
			
		</script>
	</body>
</html>