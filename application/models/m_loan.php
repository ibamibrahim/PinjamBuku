<?php

	class m_loan extends CI_Model {
		function getLoan(){
			return $this->db->get('loan');
		}

		function getLoanedBook($user_id){
		    $sql = "SELECT loan_id, book_id From Loan WHERE user_id = '$user_id'";
            $query = $this->db->query($sql);
            return $query;
        }
		function getLoanedBookData($user_id){
		    $sql = "SELECT * From Loan L, Book B WHERE L.user_id = '$user_id' AND L.book_id = B.book_id;";
            $query = $this->db->query($sql);
            return $query;
        }
	}
?>