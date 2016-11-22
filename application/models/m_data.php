<?php

	class m_data extends CI_Model {
		function getUser(){
			return $this->db->get('user');
		}

		function getBook(){
			return $this->db->get('book');
		}
	}
?>