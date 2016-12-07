<?php 
?>
<html>
	<head>
		<title>PinjamBuku</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap/dist/css/bootstrap.min.css">
    <style type="text/css">
	    @font-face {
	    	font-family: nevis;
	    	src: url('Fonts/nevis.ttf');
		}

		@font-face {
	    	font-family: monospace;
	    	src: url('https://fonts.googleapis.com/css?family=Maitree');
		}

		body{
			font-family: monospace;
		}

      h1{
        text-align: center;
        padding: 50px;
        font-family: nevis; /* Download nevis font in http://tenbytwenty.com/?xxxx_posts=nevis */
        font-size: 42px;
		font-weight: bold;
      }
      .subtitle{
		padding: 10px;
		font-family: nevis; /* Download nevis font in http://tenbytwenty.com/?xxxx_posts=nevis */
		font-size: 24px;
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
                  echo '<div class="navbar-nav navbar-right">
                    <a class="navbar-text dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Admin <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-book"></span> Pinjaman</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                      </ul></div>';
                ?> 
          </div>
        </nav>
      </div>
      <div class="container" id="title">
        <h1>Input Buku Baru</h1>
      </div>
        <div class="form row" align="center">
            <form method="post" action="" enctype="multipart/form-data">
                <!-- define your form here -->
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <p>Pilih File yang ingin di upload (Maksimal ukuran file adalah 4MB): </p>
                    <div class="text-center border ctr input-group">
                        <input type="file" name="fileDocument" class="ctr" id="fileDocument">
                        <span class="input-group-btn">
                        <input type="submit" value="Upload" name="submit" class="btn btn-primary"> 
                        </span>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </form>
        </div>
      <div class="form" >
          <form>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4 subtitle">
	            	<label>Judul Buku</label>
              	</div>
              </div>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4">
              	<textarea class="form-control col" cols="50" name="judulBuku" placeholder="Masukkan Judul Buku..." rows="1"></textarea>
              </div>
              </div>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4 subtitle">
	            	<label>Penulis</label>
              	</div>
              </div>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4">
              	<textarea class="form-control col" cols="50" name="penulis" placeholder="Masukkan Nama Penulis..." rows="1"></textarea>
              </div>
              </div>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4 subtitle">
	            	<label>Penerbit</label>
              	</div>
              </div>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4">
              	<textarea class="form-control col" cols="50" name="penerbit" placeholder="Masukkan Nama Penerbit Buku..." rows="1"></textarea>
              </div>
              </div>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4 subtitle">
	            	<label>Deskripsi</label>
              	</div>
              </div>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4">
              	<textarea class="form-control col" cols="50" name="deskripsi" placeholder="Masukkan Deskripsi Buku..." rows="4"></textarea>
              </div>
              </div>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4 subtitle">
	            	<label>Jumlah Buku</label>
              	</div>
              </div>
              <div class="row">
              	<div class="col-xs-4"></div>
              	<div class="col-xs-4">
              	<textarea class="form-control col" cols="50" name="deskripsi" placeholder="Masukkan Jumlah Buku..." rows="1"></textarea>
              </div>
              </div>
              <div class="clearfix"></div>
            </form>
            </div>
        </div>
        <div align="center">
        	<input type="submit" value="Menambahkan Buku" class="btn btn-primary">
        </div> 
     <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>	
</html>