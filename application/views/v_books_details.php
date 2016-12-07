<?php 
    $logged_in = null !== $this->session->userdata('role');
?>
<html>
	<head>
		<title>PinjamBuku</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap/dist/css/bootstrap.css">
    <style type="text/css">
    @font-face {
    	font-family: nevis;
    	src: url('Fonts/nevis.ttf');
	}
	@font-face {
        font-family: maitree;
        src: url('https://fonts.googleapis.com/css?family=Maitree');
	}

	h1
	{
  		font-family: nevis;
  		font-size: 42px;
  		font-weight: bold;
	}

	body{
		font-family: monospace;
	}

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

    .subtitle{
    	font-size: 24px;
    	padding-bottom: 2px;
    	font-family: nevis; /* Download nevis font in http://tenbytwenty.com/?xxxx_posts=nevis */
    }
    </style>
	</head>
  	<body>
      <?php $this->load->view('header');?>
      <?php 
        foreach ($bookdetail as $key => $b) {
          $book_id = $b->book_id;
          $img_path = $b->img_path;
          $title = $b->title;
          $author = $b->author;
          $publisher = $b->publisher;
          $desc = $b->description;
          $quantity = $b->quantity;
        }
      ?>
      <div class="container" id="title">
        <h1><?php echo $title ?></h1>
      </div>
      <div class="rows">
        <div class="col-xs-1"></div>
        <div class="col-xs-2 pull-left" id="book-cover">
          <div class="container">
            <img src="<?php echo $img_path?>" class="img-responsive" alt="none" width='300px' height='400px'>
          </div>
        </div>
        <div class="col-xs-1"></div>
        <div class="col-xs-8" id="book-desc">
          <div>
            <div class="subtitle">
          		<p>Penulis</p>
          	</div>
            <div id="penulis">
              <?php echo $author ?>
            </div>
            <div class="subtitle">
          		<p>Penerbit</p>
          	</div>
            <div id="penerbit">
              <?php echo $publisher ?>
            </div>
            <div class="subtitle">
          		<p>Deskripsi</p>
          	</div>
            <div>
              <?php echo $desc ?>
            </div>
            <div class="subtitle">
          		<p>Jumlah Buku yang tersedia</p>
          	</div>
            <div id="jumlahBuku">
              <?php echo $quantity ?>
            </div>
              <?php

              $isLoggedIn = $this->session->has_userdata('username');
              if($isLoggedIn){
                  if($quantity > 0){
                      $isSudahDipinjam = false;
                      foreach($loaned_book as $book){
                          if($book_id == $book->book_id) {
                            //buku udah dipinjem
                              echo '<form action="'.base_url().'PPWE_1/index.php/books/kembalikan" method="post">
                                <input type="hidden" name="loan_id" value="' .$book->loan_id .'">
                                <input type="hidden" name="book_id_kembalikan" value="'.$book_id.'">
                                <input type="hidden" name="page" value="page-details">
                                <button type="submit" class="btn btn-danger btn-sm" value="Kembalikan">Kembalikan</button>
                            </form>';
                              $isSudahDipinjam = true;
                              break;
                          }
                      }
                      if(!$isSudahDipinjam){
                      echo '<form action="'.base_url().'PPWE_1/index.php/books/pinjam" method="post">
                      <input type="hidden" name="book_id_pinjam" value="'.$book_id.'">
                      <input type="hidden" name="page" value="page-details">
                      <button type="submit" class="btn btn-primary btn-sm" value="Pinjam">'.$b->quantity.'buku lagi</button>
                      </form>';
                      }
                  } else {
                    echo '<form action="books/pinjam" method="post">
                    <input type="hidden" name="book_id_pinjam" value="'.$book_id.'">
                    <input type="submit" class="btn btn-primary btn-sm" value="Stock habis" disabled>
                    </form>';
                  }
                  } else {
                        echo '<form action="'.base_url().'PPWE_1/index.php/" method="post"><button type="submit" class="btn btn-primary btn-sm" value="Pinjam">Login untuk      meminjam</button></form>';
                  }

              ?>
          </div>
        </div>
      </div>
            <div class="container">
              <div class="row">
                <div class="col-sm-12 subtitle" >
                  <h3>Review</h3>
                </div>
              </div>
              <?php
                foreach ($review as $key => $r) {
                  echo ' <div class="row">
                <div class="col-sm-1">
                  <div class="thumbnail">
                    <img class="img-responsive user-photo" src="' . base_url() .'/PPWE_1/assets/images/dummy.png">
                  </div>
                </div>';

                  echo ' <div class="col-sm-7">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <strong>' . $r->username . '</strong> <span class="text-muted"> commented on ' . $r->date . '</span></div>';

                  echo '<div class="panel-body">' . $r->content . '</div></div></div></div>';
                }

              ?>
            <div id="review">
                <?php if($isLoggedIn){
                    echo "mantap";
                } else {
                    echo "<form action=\"'.base_url().'PPWE_1/index.php/\" method=\"post\"><button type=\"submit\" class=\"btn btn-primary btn-sm\" value=\"Pinjam\">Login untuk mereview</button></form>";
                }
                ?>
                <div class="row">
                  <div class="col-sm-1">
                    <div class="thumbnail">
                      <img class="img-responsive user-photo" src="<?php echo base_url()?>/PPWE_1/assets/images/dummy.png">
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="panel panel-default">
                        <form action="<?php echo base_url(). 'PPWE_1/index.php/books/review'; ?>" method="post">
                        <textarea class="form-control" cols="50" name="content" placeholder="Masukkan Review Buku..." rows="4"></textarea>
                        <input type="hidden" name="book-id" value=
                        <?php
                          foreach ($bookdetail as $b) { 
                            echo "'" . $b->book_id . "'"; 
                          } 
                        ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-7"></div>
                    <input type="hidden" name="book_id_review" value="<?php echo $b->book_id ?>">
                    <input type="submit" value="Review" name="submit-review" class="btn btn-primary">
                  </div>
                </div>
            </div>
            </div>
     <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	</body>
</html>