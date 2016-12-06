<?php 

	class m_books extends CI_Model {
		function getAllBooks(){ 
			return $this->db->get('book');
		}

		function getBook($id){
			$sql = "SELECT * FROM Book B WHERE B.book_id = '$id'";
			$query  = $this->db->query($sql);

			return $query;
		}

		function pinjam($user_id, $book_id){
			$sql = "INSERT INTO Loan (book_id, user_id) VALUES ('$book_id', '$user_id');";
			$query = $this->db->query($sql);
		}

		function getAllJudul(){
			$sql = "SELECT book_id, title FROM Book;";
			$query  = $this->db->query($sql);
			return $query;
		}

		function addNewBook($img_path, $title, $author, $publisher, $description, $quantity){
			$sql = "INSERT INTO Book (img_path, title, author, publisher, description, quantity) VALUES ('$img_path', '$title', '$author', '$publisher', '$description', '$quantity');";
			$query  = $this->db->query($sql);
		}

		function addQuantityToBook($book_id, $quantity){
			$sql = "UPDATE Book SET quantity= quantity + '$quantity' WHERE book_id='$book_id';";
			$query  = $this->db->query($sql);
		}
	}
?>