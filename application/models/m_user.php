<?php

	class m_user extends CI_Model {
		
		function getUser(){
			return $this->db->get('user');
		}

		function getUserId($username){
			$sql = "SELECT user_id from user WHERE username = '$username'";
			$query = $this->db->query($sql);

			return $query;
		}
	}
?>	

			