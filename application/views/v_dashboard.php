<?php 
	
?>
<!DOCTYPE html>
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
        body{
            background-color: #eeeeee;
            padding-top: 60px;
            font-family: monospace;
            font-weight: bold;

        }
        h4{
            font-family: nevis; /* Download nevis font in http://tenbytwenty.com/?xxxx_posts=nevis */
        }
        /*
        .shadow:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }

        .shadow-1 {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.5s cubic-bezier(.25,.8,.25,1);
        }

        .shadow-2 {
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            transition: all 0.5s cubic-bezier(.25,.8,.25,1);
        }

        .shadow-3 {
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            transition: all 0.5s cubic-bezier(.25,.8,.25,1);
        }

        .shadow-4 {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            transition: all 0.5s cubic-bezier(.25,.8,.25,1);
        }

        .shadow-5 {
            box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
            transition: all 0.5s cubic-bezier(.25,.8,.25,1);
        }
        */
        #content{
            padding-right: 50px;
            padding-left: 50px;
        }
        /*shadow adapted from https://codepen.io/sdthornton/pen/wBZdXq*/
        .book-grid {
            padding: 10px;
            height: 450px;
        }
        .book-card {
            padding: 0px;
        }
        .book-cover {
            width: 100%;
            height: 285px;
        }
        .book-desc {
            padding: 10px;
            background-color: #fdfdfd;
        }
        </style>
	</head>
	<body>
        <?php $this->load->view('header');?>
        <?php
            echo '<div class="container-fluid" id= "content">';
            $counter = 0;
            foreach ($book as $b){

                if(strlen($b->title) > 20) {
                    $judul = substr($b->title, 0, 17) . "...";
                } else {
                    $judul = $b->title;
                }

                if(strlen($b->author) > 25) {
                    $penulis = substr($b->author, 0, 22) . "...";
                } else {
                    $penulis = $b->author;
                }
                echo '
                <div class="col-sm-4 col-md-3 col-lg-2 book-grid">
                    <div class="book-card shadow-2 shadow">
                        <div>
                            <a href="books/details/'.$b->book_id.'"> <img src="'.$b->img_path.'" alt="" class="book-cover"></a>
                        </div>
                        <div class="book-desc">
                            <div>
                                <h4>'.$judul.'</h4>
                                <p>'.$penulis.'</p>
                            </div>
                            <div class="button-pinjam">';
                            $isLoggedIn = $this->session->has_userdata('username');
                               if($isLoggedIn){
                                if($b->quantity > 0){
                                    $isSudahDipinjam = false;
                                    foreach($loaned_book as $book){
                                        if($book->book_id == $b->book_id) {
                                            //buku udah dipinjem
                                            echo '<form action="books/kembalikan" method="post">
                                    <input type="hidden" name="loan_id" value="' .$book->loan_id .'">
                                    <input type="hidden" name="page" value="dashboard">
                                    <input type="hidden" name="book_id_kembalikan" value="'.$b->book_id.'">
                                    <button type="submit" class="btn btn-danger btn-sm" value="Kembalikan">Kembalikan</button>
                                </form>';
                                            $isSudahDipinjam = true;
                                            break;
                                        }
                                    }
                                    if(!$isSudahDipinjam){
                                        echo '<form action="books/pinjam" method="post">
                                    <input type="hidden" name="book_id_pinjam" value="'.$b->book_id.'">
                                    <input type="hidden" name="page" value="dashboard">
                                    <button type="submit" class="btn btn-primary btn-sm" value="Pinjam">'.$b->quantity.'buku lagi</button>
                                </form>';
                                    }
                                } else {
                                  echo '<form action="books/pinjam" method="post">
                                    <input type="hidden" name="book_id_pinjam" value="'.$b->book_id.'">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Stock habis" disabled>
                                </form>';
                                }
                            } else {
                                echo '<form action="login" method="post"><button type="submit" class="btn btn-primary btn-sm" value="Pinjam">Login untuk meminjam</button></form>';
                               }
                            echo '</div>
                        </div>
                    </div>
                </div>';
            }
            echo '</div>';
        ?>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript">
            document.getElementByClassName("book-cover").css("height", document.getElementByClassName(".book-cover").css("width") * 1.5);
        </script>
	</body>	
</html>