<?php 

	class Author_model extends CI_Model{
		
		public function getCount(){
			return $this->db->count_all_results('authors');
		}

		public function getAuthors($limit,$start){
			$this->db->limit($limit,$start);
			$query = $this->db->get('authors');
			return $query->result();
		}
	}
