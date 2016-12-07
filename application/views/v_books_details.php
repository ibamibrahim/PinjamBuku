<?php 
    $logged_in = null !== $this->session->userdata('role');
?>
<html>
	<head>
		<title>PinjamBuku</title>
		<meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa:700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/style.css">
    <style type="text/css">
    @font-face {
    	font-family: nevis;
    	src: url('Fonts/nevis.ttf');
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
      margin-bottom: 0px;
    	font-size: 1.5em;
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
            <div>
          		<p class="subtitle">Penulis</p>
              <?php echo $author ?>
            </div>
            <div>
          		<p class="subtitle">Penerbit</p>
              <?php echo $publisher ?>
            </div>
            <div>
          		<p class="subtitle">Deskripsi</p>
              <?php echo $desc ?>
            </div>
            <br>
              <?php
              $isSudahDipinjam = false;
              foreach($loaned_book as $book){
                  if($book->book_id == $b->book_id){$isSudahDipinjam = true;}
              }
              $isLoggedIn = $this->session->has_userdata('username');
              $role = $this->session->userdata('role');
              if($role != 'admin') {
                  if ($isLoggedIn) {
                      if ($b->quantity > 0) {
                          foreach ($loaned_book as $book) {
                              if ($isSudahDipinjam) {
                                  //buku udah dipinjem
                                  echo '<form action="' . base_url() . 'PPWE_1/index.php/books/kembalikan" method="post">
                                    <input type="hidden" name="loan_id" value="' . $book->loan_id . '">
                                    <input type="hidden" name="page" value="page-details">
                                    <input type="hidden" name="book_id_kembalikan" value="' . $b->book_id . '">
                                    <button type="submit" class="btn btn-danger btn-sm" value="Kembalikan">Kembalikan</button>
                                </form>';
                                  break;
                              }
                          }
                          if (!$isSudahDipinjam) {
                              echo '<form action="' . base_url() . 'PPWE_1/index.php/books/pinjam" method="post">
                                    <input type="hidden" name="book_id_pinjam" value="' . $b->book_id . '">
                                    <input type="hidden" name="page" value="page-details">
                                    <button type="submit" class="btn btn-primary btn-md" value="Pinjam">Pinjam <span class="badge">' . $b->quantity . '</span></button>
                                </form>';
                          }
                      } else {
                          if ($isSudahDipinjam) {
                              echo '<form action="' . base_url() . 'PPWE_1/index.php/books/kembalikan" method="post">
                                    <input type="hidden" name="loan_id" value="' . $book->loan_id . '">
                                    <input type="hidden" name="page" value="page-details">
                                    <input type="hidden" name="book_id_kembalikan" value="' . $b->book_id . '">
                                    <button type="submit" class="btn btn-danger btn-sm" value="Kembalikan">Kembalikan</button>
                                </form>';
                          } else {
                              echo '<form action="' . base_url() . 'PPWE_1/index.php/books/pinjam" method="post">
                                    <input type="hidden" name="book_id_pinjam" value="' . $b->book_id . '">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Stock habis" disabled>
                                </form>';
                          }

                      }
                  } else {
                      echo '<form action="' . base_url() . 'PPWE_1/index.php/login" method="post"><button type="submit" class="btn btn-primary btn-sm" value="Pinjam">Login untuk meminjam</button></form>';
                  }
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
                <?php
                    if ($isLoggedIn) {
                        echo '   <div class="row">
                  <div class="col-sm-1">
                    <div class="thumbnail">
                      <img class="img-responsive user-photo" src="' . base_url() . '/PPWE_1/assets/images/dummy.png">
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="panel panel-default">
                        <form action="' . base_url() . 'PPWE_1/index.php/books/review" method="post">
                        <textarea class="form-control" cols="50" name="content" placeholder="Masukkan Review Buku..." rows="4"></textarea>
                        <input type="hidden" name="book-id" value="';
                        foreach ($bookdetail as $b) {
                            echo $b->book_id;
                        }
                        echo '">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-7"></div>
                    <input type="hidden" name="book_id_review" value="<?php echo $b->book_id ?>">
                    <input type="submit" value="Review" name="submit-review" class="btn btn-primary">
                  </div>';
                    } else {
                        echo "<form action='" . base_url() . "PPWE_1/index.php/login' method='post'><button type='submit' class='btn btn-primary btn-sm'>Login untuk mereview</button></form>";
                    }
                ?>

                </div>
            </div>
            </div>
     <script src="<?php echo base_url();?>PPWE_1/assets/js/jquery-3.1.1.min.js"></script>
     <script src="<?php echo base_url();?>PPWE_1/assets/js/bootstrap.min.js"></script>
	</body>
</html>