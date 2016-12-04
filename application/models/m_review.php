<?php 

	class m_review extends CI_Model {
		function getAllReview(){
			return $this->db->get('review');
		}

		function getReview($id){
			$sql = "SELECT review_id, date, content, username from review r, user u WHERE book_id = '$id' and r.user_id = u.user_id ";
			$query = $this->db->query($sql);

			return $query;
		}
	}

?>