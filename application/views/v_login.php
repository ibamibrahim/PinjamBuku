<!DOCTYPE html>
<html>	
	<head>
		<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa:700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Reem+Kufi" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/login-style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/style.css">
		<title>
			Login
		</title>
		<style type="text/css">
			#lanjut {
				text-align: center;
			}
		body{
            padding-top: 40px;
            font-family: 'Reem Kufi', sans-serif;

        }
		</style>
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
		            	<div class="title">
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
			            		<br><br>
			            		<a id="lanjut" href="<?php echo base_url();?>PPWE_1/index.php/dashboard">Langsung lihat Buku</a>
			            	</div>
			            	<br>
		            	</form>
		            </div>
		        </div>
		    </div>
		</div>
		<script src="<?php echo base_url();?>PPWE_1/assets/js/jquery-3.1.1.min.js"></script>
     <script src="<?php echo base_url();?>PPWE_1/assets/js/bootstrap.min.js"></script>
	</body>
</html>