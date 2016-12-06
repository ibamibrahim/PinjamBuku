<?php 
    $logged_in = isset($this->session->userdata());
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PinjamBuku</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap/dist/css/bootstrap.css">
        <style>
        body{
            background-color: #eeeeee;
            padding-top: 60px;
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
            height: auto;
        }
        .book-desc {
            padding-left: 10px;
            padding-right: 5px;
            overflow: hidden;
            background-color: #fdfdfd;
        }
        .button-pinjam {
            margin:5px;
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
                    <div class="navbar-nav navbar-right">
    					<a class="navbar-text dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Nama User <span class="caret"></span></a>
        				<ul class="dropdown-menu">
          				    <li><a href="#"><span class="glyphicon glyphicon-book"></span> Pinjaman</a></li>
          					<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
        				</ul>
                    </div>'
				</div>
			</nav>
		</div>
        <div>
            <h3>Pinjaman Anda</h3>
        </div>
        <?php
            $book1 = array('id'=>1, 'imgurl' => 'src/images/dummy.png', 'judul' => 'dummy', 'pengarang' => 'anonymous');
            $book2 = array('id'=>2, 'imgurl' => 'src/images/dummy1.jpg', 'judul' => 'catching fire', 'pengarang' => 'suzanne collins');
            $book3 = array('id'=>3, 'imgurl' => 'src/images/dummy2.jpg', 'judul' => 'The Rights of Nature', 'pengarang' => 'bla bla');
            $book4 = array('id'=>4, 'imgurl' => 'src/images/dummy3.jpg', 'judul' => 'a \'cute\' leukimia', 'pengarang' => 'rodney curtnis');
            $book5 = array('id'=>5, 'imgurl' => 'src/images/dummy4.jpg', 'judul' => 'sharpe\'s siege', 'pengarang' => 'bernard cornwell');
            $books = array($book1,$book2,$book3,$book4,$book5,$book3,$book2,$book1);
            echo '<div class="container-fluid" id= "content">';
            for ($i = 0; $i < count($books); $i++){
                echo '
                <div class="col-sm-4 col-md-3 col-lg-2 book-grid">
                    <div class="book-card shadow-2 shadow">
                        <div>
                            <img src="'.$books[$i]['imgurl'].'" alt="" class="book-cover">
                        </div>
                        <div class="book-desc">
                            <div>
                                <h4>'.$books[$i]['judul'].'</h4>
                                <p>'.$books[$i]['pengarang'].'</p>
                            </div>
                            <div class="button-pinjam">
                                <form action="index.php" method="post">
                                    <input type="hidden" name="command" value="pinjam">
                                    <input type="hidden" name="book" value="'.$books[$i]['id'].'">
                                    <button type="submit" class="btn btn-success btn-sm">Kembalikan</button>
                                </form>
                            </div>
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