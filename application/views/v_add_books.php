<!DOCTYPE html>
<html>
<head>
	<title>Add books</title>
</head>
<body>
	<?php 
		if(isset($error)){
			echo $error;
		} 
	?>

	<h1> Add books </h1>

	<?php echo form_open_multipart(base_url() . 'PPWE_1/index.php/books/add_book');?>
		<input type="text" name="judul" placeholder="Judul Buku"><br><br>
		<input type="text" name="penulis" placeholder="Penulis"><br><br>
		<input type="text" name="penerbit" placeholder="Penerbit"><br><br>
		<input type="text" name="deskripsi" placeholder="Deskripsi"><br><br>
		<input type="text" name="quantity" placeholder="Quantity"><br><br>
		<input type="file" name="image" size="20" /><br><br>
		<input type="submit" value="Add books" /> 
	</form>
</body>
</html>