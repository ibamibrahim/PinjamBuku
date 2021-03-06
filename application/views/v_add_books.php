<?php 
?>
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

      #title{
        text-align: center;
        padding: 50px;
      }
    </style>
	</head>
  	<body>
    <?php
        $this->load->view('header');
    ?>
      <div class="container" id="title">
        <h1>Input Buku Baru</h1>
      </div>
<div class="form row" align="center">
    <?php echo form_open_multipart(base_url().'PPWE_1/index.php/books/add_book');?>
    <!-- define your form here -->
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="text-center">
            <?php
            if(isset($error)){
                echo '
            <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>' .$error.
                    '</strong></div>';
            }
            ?>
            <input type="file" name="book_image" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple/>
            <label for="file" class="btn btn-primary margin"><span>Choose a file</span></label>
            <input class="form-control" disabled id="input_file_name">
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>

    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <label>Judul Buku</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <input type="text" class="form-control col" cols="50" name="judul" placeholder="Masukkan Judul Buku..." rows="1" required></input>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <label>Penulis</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <input type="text" class="form-control col" cols="50" name="penulis" placeholder="Masukkan Nama Penulis..." rows="1" required></input>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <label>Penerbit</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <input type="text" class="form-control col" cols="50" name="penerbit" placeholder="Masukkan Nama Penerbit Buku..." rows="1" required></input>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <label>Deskripsi</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <textarea class="form-control col" cols="50" name="deskripsi" placeholder="Masukkan Deskripsi Buku..." rows="4" required></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <label>Jumlah Buku</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <input type="number" min="0" class="form-control col" cols="50" name="jumlah" placeholder="Masukkan Jumlah Buku..." rows="1" required></input>
        </div>
    </div>
    <div class="clearfix"></div>
            </div>
    </div>
    <div align="center">
    	<input type="submit" value="Menambahkan Buku" class="btn btn-primary margin">
		</form>
    </div> 
     <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
	<style>
		.inputfile {
			width: 0.1px;
			height: 0.1px;
			opacity: 0;
			overflow: hidden;
			position: absolute;
			z-index: -1;
		}
		.inputfile + label {
		    display: inline-block;
		    float: left;
		}

		#input_file_name{
			float: right;
			text-align: center;
		}

		.inputfile + label {
			cursor: pointer; /* "hand" cursor */
	
		}

		.inputfile:focus + label {
			outline: 1px dotted #000;
			outline: -webkit-focus-ring-color auto 5px;
		}

        .margin {
            margin-top: 10px;
            margin-bottom: 10px;
        }

		/*http://jsfiddle.net/4cwpLvae/*/
		/*http://tympanus.net/codrops/2015/09/15/styling-customizing-file-inputs-smart-way/*/

	</style>
    <script src="<?php echo base_url();?>PPWE_1/assets/js/jquery-3.1.1.min.js"></script>
     <script src="<?php echo base_url();?>PPWE_1/assets/js/bootstrap.min.js"></script>
	<script>
		/*http://tympanus.net/codrops/2015/09/15/styling-customizing-file-inputs-smart-way/*/
		var inputs = document.querySelectorAll( '.inputfile' );
		Array.prototype.forEach.call( inputs, function( input )
		{
			var label	 = input.nextElementSibling,
				labelVal = label.innerHTML;

			input.addEventListener( 'change', function( e )
			{
				var fileName = '';
				if( this.files && this.files.length > 1 ){
					fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
				}
				else {
					fileName = e.target.value.split( '\\' ).pop();
				}
				
				if( fileName ){
					document.getElementById("input_file_name").value = "File gambar: " + fileName;
				}else{
					label.innerHTML = labelVal;
				}
			});
		});
	</script>
</html>