<?php 

	class m_books extends CI_Model {
		function getAllBooks(){
			return $this->db->get('book');
		}

		function getBook($id){
			$sql = "SELECT * FROM Book B WHERE B.book_id = '$id' ";
			$query  = $this->db->query($sql);

			return $query;
		}

		function pinjam($user_id, $book_id){
			$sql = "INSERT INTO Loan (book_id, user_id) VALUES ('$book_id', '$user_id');";
			$query = $this->db->query($sql);
		}
	}

?>