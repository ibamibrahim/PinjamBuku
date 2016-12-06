
<html>
	<head>
		<title>PinjamBuku</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap/dist/css/bootstrap.min.css">
    <style type="text/css">
    #title{
      text-align: center;
      padding: 30px;
    }
    .thumbnail {
    padding:0px;
    }
    .panel {
        position:relative;
    }
    .panel>.panel-heading:after,.panel>.panel-heading:before{
      position:absolute;
      top:11px;left:-16px;
      right:100%;
      width:0;
      height:0;
      display:block;
      content:" ";
      border-color:transparent;
      border-style:solid solid outset;
      pointer-events:none;
    }
    .panel>.panel-heading:after{
      border-width:7px;
      border-right-color:#f7f7f7;
      margin-top:1px;
      margin-left:2px;
    }
    .panel>.panel-heading:before{
      border-right-color:#ddd;
      border-width:8px;
    }
    </style>
	</head>
  	<body>
  		<div id="nav">
      <nav class="navbar navbar-default navbar-fixed-top shadow-1">
        <div class="container-fluid">
          <div class="navbar-header">
                <a class="navbar-brand" href="#">PinjamBuku</a>
          </div>
            <?php 
              echo '<form class="navbar-form navbar-right" action="index.php" method="post">
                <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <input type="hidden" name="command" value="login">
                </div>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Log in</button>
                </form>';
            ?> 
        </div>
      </nav>
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
            <img src="<?php echo base_url()?>/PPWE_1/assets/images/dummy.png" class="img-responsive" alt="none" width='300px' height='400px'>
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
          </div>
        </div>
      </div>
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <h3>Review</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-1">
                  <div class="thumbnail">
                    <img class="img-responsive user-photo" src="<?php echo base_url()?>/PPWE_1/assets/images/dummy.png">
                  </div>
                </div>

                <div class="col-sm-7">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
                    </div>
                    <div class="panel-body">
                      Kok Bukunya keren?
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-1">
                  <div class="thumbnail">
                    <img class="img-responsive user-photo" src="<?php echo base_url()?>/PPWE_1/assets/images/dummy.png">
                  </div>
                </div>

                <div class="col-sm-7">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
                    </div>
                    <div class="panel-body">
                      Kok kamu protes?
                    </div>
                  </div>
                </div>
              </div>
              <div id="review">
                <div class="row">
                  <div class="col-sm-1">
                    <div class="thumbnail">
                      <img class="img-responsive user-photo" src="<?php echo base_url()?>/PPWE_1/assets/images/dummy.png">
                    </div>
                  </div>

                  <div class="col-sm-7">
                    <div class="panel panel-default">
                        <textarea class="form-control col" cols="50" name="deskripsi" placeholder="Masukkan Review Buku..." rows="4"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-7"></div>
                    <input type="submit" value="Review" class="btn btn-primary">
                  </div>
                </div>
              </div>
            </div>
     <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<body>
</html>