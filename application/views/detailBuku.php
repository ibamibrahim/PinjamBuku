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
      padding: 30px;
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
                         <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Log in</button>
                    </form>';
                }
                ?> 
          </div>
        </nav>
      </div>
      <div class="container" id="title">
        <h1>This is Title</h1>
      </div>
      <div class="rows">
        <div class="col-xs-1"></div>
        <div class="col-xs-2 pull-left" id="book-cover">
          <div class="container">
            <img src="src/images/dummy.png" alt="none" width='300px' height='400px'>
          </div>
        </div>
        <div class="col-xs-1"></div>
        <div class="col-xs-8" id="book-desc">
          <div class="container">
            <p>Judul Buku</p>
            <div id="judulBuku">
              dummy
            </div>
            <p>Penulis</p>
            <div id="penulis">
              anonymous
            </div>
            <p>Penerbit</p>
            <div id="penerbit">
              anonymous
            </div>
            <p>Deskripsi</p>
            <div id="deskripsi">
              undescriptive
            </div>
            <p>Jumlah Buku</p>
            <div id="jumlahBuku">
              undefined
            </div>
            <p>Review  </p>
            <div id="daftarReview">
              <div id="namaReviewer">
                anonymous
              </div>
              <div id="tanggalReview">
                classified
              </div>
              <div id="review">
              </div>
            </div>
          </div>
        </div>
      </div>
     <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<body>
</html>