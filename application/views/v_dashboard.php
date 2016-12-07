<?php 
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PinjamBuku</title>
		<meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa:700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/style.css">
        <style type="text/css">
        body{
            padding-top: 60px;

        }
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
            background-color: #f3f3f3;
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
                        <a href="books/details/'.$b->book_id.'">
                        <div>
                             <img src="'.$b->img_path.'" alt="" class="book-cover">
                        </div>
                        <div class="book-desc">
                            <div>
                                <h4>'.$judul.'</h4>
                                <p>'.$penulis.'</p>
                            </div>
                            <div class="button-pinjam">';
                            $isSudahDipinjam = false;
                            foreach($loaned_book as $book){
                                if($book->book_id == $b->book_id){$isSudahDipinjam = true;}
                            }
                            $isLoggedIn = $this->session->has_userdata('username');
                               if($isLoggedIn){
                                if($b->quantity > 0){
                                    foreach($loaned_book as $book){
                                        if($isSudahDipinjam) {
                                            //buku udah dipinjem
                                            echo '<form action="books/kembalikan" method="post">
                                    <input type="hidden" name="loan_id" value="' .$book->loan_id .'">
                                    <input type="hidden" name="page" value="dashboard">
                                    <input type="hidden" name="book_id_kembalikan" value="'.$b->book_id.'">
                                    <button type="submit" class="btn btn-danger btn-sm" value="Kembalikan">Kembalikan</button>
                                </form>';
                                            break;
                                        }
                                    }
                                    if(!$isSudahDipinjam){
                                        echo '<form action="books/pinjam" method="post">
                                    <input type="hidden" name="book_id_pinjam" value="'.$b->book_id.'">
                                    <input type="hidden" name="page" value="dashboard">
                                    <button type="submit" class="btn btn-primary btn-sm" value="Pinjam">Pinjam</button>
                                </form>';
                                    }
                                } else {
                                    if($isSudahDipinjam){
                                        echo '<form action="books/kembalikan" method="post">
                                    <input type="hidden" name="loan_id" value="' .$book->loan_id .'">
                                    <input type="hidden" name="page" value="dashboard">
                                    <input type="hidden" name="book_id_kembalikan" value="'.$b->book_id.'">
                                    <button type="submit" class="btn btn-danger btn-sm" value="Kembalikan">Kembalikan</button>
                                </form>';
                                    } else {
                                        echo '<form action="books/pinjam" method="post">
                                    <input type="hidden" name="book_id_pinjam" value="'.$b->book_id.'">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Stock habis" disabled>
                                </form>';
                                    }

                                }
                            } else {
                                echo '<form action="login" method="post"><button type="submit" class="btn btn-primary btn-sm" value="Pinjam">Login untuk meminjam</button></form>';
                               }
                            echo '</div>
                        </div>
                        </a>
                    </div>
                </div>';
            }
            echo '</div>';
        ?>
		<script src="<?php echo base_url();?>PPWE_1/assets/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url();?>PPWE_1/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            document.getElementByClassName("book-cover").css("height", document.getElementByClassName(".book-cover").css("width") * 1.5);
        </script>
	</body>	
</html>