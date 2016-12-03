<?php 
	session_start();
	$loggedIn = true;//isset($_SESSION['user']);
?>
<html>
	<head>
		<title>PinjamBuku</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="src/css/bootstrap/dist/css/bootstrap.css">
    <style type="text/css">
      #title{
        text-align: center;
        padding: 50px;
      }
    </style>
	</head>
  	<body>
  		<div id="nav">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
                  <a class="navbar-brand" href="#">PinjamBuku</a>
            </div>
                <?php 
                if($loggedIn) {
                  echo '<div class="navbar-nav navbar-right">
                    <a class="navbar-text dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Admin <span class="caret"></span></a>
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
                         <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Log in</button>
                    </form>';
                }
                ?> 
          </div>
        </nav>
      </div>
      <div class="container" id="title">
        <h1>Input Buku Baru</h1>
      </div>
     <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>	
</html>