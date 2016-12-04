<?php
	function connectDB() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tugasAkhir";
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " + mysqli_connect_error());
		}
		return $conn;
	}

	function login(){
        $conn = connectDB();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, username, password, fullname, email, role FROM user";
        $result = mysqli_query($conn, $sql);
        if($result){

        }
        else {
            die("Error: $sql");
        }

        foreach ($result as $value) {
            if($value['username']==$username && $value['password']==$password) {
                if($value['role'] == 'admin'){
                    header("Location: admin.php");
                }
            }
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
    }

?>
<!DOCTYPE html>
<html>	
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/style/loginStyle.css">
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
		            	<h4>Login Perpustakaan</h4>
            			<form action="<?php echo base_url(). 'PPWE_1/index.php/login/login'; ?>" method="post">
			            	<input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" name="username" />
			            	</br>
			            	<input type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" name="password" />
			            	</br>
			            	<div class="wrapper">
			            		<span class="group-btn">
	            					<input type="submit"  class="btn btn-primary btn-md name="submit" id="submitButton" value="Login">
			            		</span>
			            		<span class="group-btn">     
			                		<a href="index.php/dashboard" class="btn btn-primary btn-md"> Melihat Buku</a>
			            		</span>
			            	</div>
		            	</form>
		            </div>
		        </div>
		    </div>
		</div>
	</body>
</html>