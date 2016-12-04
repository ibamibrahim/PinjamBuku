<?php

	class m_loan extends CI_Model {
		function getLoan(){
			return $this->db->get('loan');
		}
	}
?>