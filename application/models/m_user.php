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

		function getUserName($user_id){
			$sql = "Select username from user where user_id='$user_id'";
			$query = $this->db->query($sql);
			return $query;
		}
	}
?>	

			