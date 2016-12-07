<?php 
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PinjamBuku</title>
		<meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa:700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Reem+Kufi" rel="stylesheet">
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
        .book-grid {
            position: relative; 
            width: 100%
            height auto;
            margin-bottom: 30px;
            padding-left: 5px;
            padding-right: 5px;
            z-index: 1;
        }
        .book-desc {
            padding: 10px;
            background-color: rgba(243,243,243,0.9);
            text-align: justify;
            overflow: scroll;
            height: 100%;
            width: 70%;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 3;
            display : none;
        }
        
        @keyframes to-left {
            from {width: 0;}
            to {width: 70%;}
        }

        .book-grid:hover .book-desc {
            display: block;
            animation-name: to-left;

            animation-duration: 1s;
        }

        .book-grid .book-desc {
            display: none;
        }

        .book-cover {
            width: 100%;
            height: auto;
            z-index: 2;
        }

        .button-pinjam {
            bottom: 5px;
        }
        </style>

	</head>
	<body>
        <?php $this->load->view('header');?>
        <?php
            echo '<div id="content">';
            $col1 = '<div class="col-sm-4" id="col-1">';
            $col2 = '<div class="col-sm-4" id="col-2">';
            $col3 =  '<div class="col-sm-4" id="col-3">';

            foreach ($book as $b){
                $thisbook =  '
                <div class="book-grid" id="book-grid'.$b->book_id.'"> 
                    <a href="books/details/'.$b->book_id.'">
                    <div>
                         <img src="'.$b->img_path.'" alt="" class="book-cover" id="book-cover'.$b->book_id.'">
                    </div>
                    <div class="book-desc pull-right" id="book-desc'.$b->book_id.'">
                        <div>
                            <h4 class="title">'.$b->title.'</h4>
                            <h5>'.$b->author.'</h5><br>
                            <p>'.$b->description.'<p>
                            <p> Jumlah buku tersedia: '.$b->quantity.'</p>
                        </div>
                        
                        <div class="button-pinjam">';
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
                                            $thisbook .= '<form action="books/kembalikan" method="post">
                                <input type="hidden" name="loan_id" value="' . $book->loan_id . '">
                                <input type="hidden" name="page" value="dashboard">
                                <input type="hidden" name="book_id_kembalikan" value="' . $b->book_id . '">
                                <button type="submit" class="btn btn-danger btn-sm" value="Kembalikan">Kembalikan</button>
                            </form>';
                                            break;
                                        }
                                    }
                                    if (!$isSudahDipinjam) {
                                        $thisbook .= '<form action="books/pinjam" method="post">
                                <input type="hidden" name="book_id_pinjam" value="' . $b->book_id . '">
                                <input type="hidden" name="page" value="dashboard">
                                <button type="submit" class="btn btn-primary btn-sm" value="Pinjam">Pinjam</button>
                            </form>';
                                    }
                                } else {
                                    if ($isSudahDipinjam) {
                                        $thisbook .= '<form action="books/kembalikan" method="post">
                                <input type="hidden" name="loan_id" value="' . $book->loan_id . '">
                                <input type="hidden" name="page" value="dashboard">
                                <input type="hidden" name="book_id_kembalikan" value="' . $b->book_id . '">
                                <button type="submit" class="btn btn-danger btn-sm" value="Kembalikan">Kembalikan</button>
                            </form>';
                                    } else {
                                        $thisbook .= '<form action="books/pinjam" method="post">
                                <input type="hidden" name="book_id_pinjam" value="' . $b->book_id . '">
                                <input type="submit" class="btn btn-primary btn-sm" value="Stock habis" disabled>
                            </form>';
                                    }

                                }
                            } else {
                                $thisbook .= '<form action="login" method="post"><button type="submit" class="btn btn-primary btn-sm" value="Pinjam">Login untuk meminjam</button></form>';
                            }
                        }
                        $thisbook .= '</div>
                    </div>
                    </a>
                </div>';
                if($b->book_id % 3 == 1) {
                    $col1 .= $thisbook;
                } else if($b->book_id % 3 == 2) {
                    $col2 .= $thisbook;
                } else if($b->book_id % 3 == 0) {
                    $col3 .= $thisbook;
                }
            }
            echo $col1 . '</div>';
            echo $col2 . '</div>';
            echo $col3 . '</div>';
            echo '</div>';
        ?>
		<script src="<?php echo base_url();?>PPWE_1/assets/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url();?>PPWE_1/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                window.alert('blabla');
                for(var i = 1; i <= ($("#col1").length() + $("#col2").length() + $("#col3").length(); i++){
                    $("#book-cover" + 'i').hover(function(){
                        $("#book_desc" + 'i').animate({
                            width: 'toggle'
                        });
                    });
                }
            });
        </script>
	</body>	
</html>