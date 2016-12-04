<?php

	class m_data extends CI_Model {
		function getUser(){
			return $this->db->get('user');
		}

		function getAllBooks(){
			return $this->db->get('book');
		}

		function getBook($id){
			$sql = "SELECT * FROM Book B WHERE B.book_id = '$id' ";
			$query  = $this->db->query($sql);

			return $query;
		}

		function getLoan(){
			return $this->db->get('loan');
		}

		function getAllReview(){
			return $this->db->get('review');
		}

		function getReview($id){
			$sql = "SELECT review_id, date, content, username from review r, user u WHERE book_id = '$id' and r.user_id = u.user_id ";
			$query = $this->db->query($sql);

			return $query;
		}

		function getUserId($username){
			$sql = "SELECT user_id from user WHERE username = '$username'";
			$query = $this->db->query($sql);

			return $query;
		}

		function pinjam($user_id, $book_id){
			$sql = "INSERT INTO Loan (book_id, user_id) VALUES ('$book_id', '$user_id');";
			$query = $this->db->query($sql);
		}
	}
?>