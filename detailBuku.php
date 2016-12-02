<?php 
	session_start();
	$loggedIn = true;//isset($_SESSION['user']);
?>
<html>
	<head>
		<title>PinjamBuku</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div id="nav">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
      					<a class="navbar-brand" href="#">PinjamBuku</a>
    				</div>
    				<form class="navbar-form navbar-left">
      					<div class="form-group">
        					<input type="text" class="form-control" placeholder="Search">
      					</div>
      					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
    				</form>
    				<?php 
    					if($loggedIn) {
    						echo '<div class="navbar-nav navbar-right">
    							<a class="navbar-text dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Nama User <span class="caret"></span></a>
        						<ul class="dropdown-menu">
          						<li><a href="#"><span class="glyphicon glyphicon-book"></span> Pinjaman</a></li>
          						<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
        						</ul></div>';
    					} else {
    						echo '<form class="navbar-form navbar-right" action="index.php" method="post">
      							<div class="form-group">
        						<input type="text" class="form-control" name="username" placeholder="Username">
        						<input type="password" class="form-control" name="password" placeholder="Password">
        						<input type="hidden" name="command" value="login">
      							</div>
      							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-log-in"></span>  Log in</button>
    							</form>';
    					}
    				?> 
    				
				</div>
			</nav>
		</div>
		<div class="col-md-offset-5 col-md-4">
			<h1>Bodo Amat Ah</h1>
		</div>
		<div>
			<?php
				
			?>
		</div>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>	
</html>