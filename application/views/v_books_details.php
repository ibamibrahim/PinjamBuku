<!DOCTYPE html>
<html>
<head>
	<title>Book details</title>
</head>
<body>
	<table>
		<tr>
			<th>book id</th>
			<th>Image</th>
			<th>Title</th>
			<th>Author</th>
			<th>Publisher</th>
			<th>Description</th>
			<th>Quantity</th>
			<th>Action</th>
		</tr>
	<?php foreach ($bookdetail as $b) { ?>
		<tr>
			<td><?php echo $b->book_id ?></td>
			<td><?php echo "<img height=50 src='" . $b->img_path . "'/>" ?></td>
			<td><?php echo $b->title?></td>
			<td><?php echo $b->author?></td>
			<td><?php echo $b->publisher?></td>
			<td><?php
				
				$desc = $b->description;
				
				// http://stackoverflow.com/questions/2104653/trim-text-to-340-chars

				$max_length = 100;

				if (strlen($desc) > $max_length)
				{
				    $offset = ($max_length - 3) - strlen($desc);
				    $desc = substr($desc, 0, strrpos($desc, ' ', $offset)) . '...';
				}

				echo $desc;
				
				?></td>
			<td><?php echo $b->quantity?></td>
			<td>
			<?php
				if(isset($user)){
					if($b->quantity > 0){
					echo "<form action='books/pinjam' method='post'>";
					echo "<input type='submit' name='pinjam' value='Pinjam'>";
					echo "</form>";
				} else {
					echo "<form action='books/pinjam' method='post'>";
					echo "<input type='submit' name='pinjam' value='Habis' disabled>";
					echo "</form>";
				}
				}
			?>
			</td>
		</tr>
	</table>
	<?php } ?>
		<?php foreach ($review as $r) { ?>
		<?php 
			echo $r->review_id . " ";
			echo $r->username . " ";
			echo $r->content  . " ";
			echo $r->date . "<br>";
		?>
	<?php } ?>

	<!-- add review -->

	<h1>Add review</h1>
	<form action="<?php echo base_url(). 'elibrary/index.php/books/review'; ?>" method="post">
		<textarea name="content"></textarea>
		<input type="hidden" name="book-id" value=
		<?php 
			foreach ($bookdetail as $b) { 
				echo "'" . $b->book_id . "'"; 
			} 
		?>
		>
		<input type="submit" name="submit-review" value="Post review">
	</form>
</body>
</html>