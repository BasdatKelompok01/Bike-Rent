<?php
	class Acara_Stasiun_model extends CI_Model{

		public function add_acara_stasiun($data){
			$sql = 'INSERT INTO acara_stasiun Values (?,?)';
			$query = $this->db->query($sql, array($data['id_stasiun'], $data['id_acara']));
			return true;
		}

		public function edit_acara_stasiun($data){
			$sql2 = 'INSERT INTO acara_stasiun Values (?,?)';
			$query = $this->db->query($sql2, array($data['id_stasiun'], $data['id_acara']));
			return true;
		}

		public function get_acara_stasiun($id){
			$sql = 'SELECT * FROM acara_stasiun WHERE id_acara = ?';
			$query = $this->db->query($sql, array($id));
			$exec = $query->result_array();
			$result = array();
			foreach($exec as $q)
			$result[$q['id_stasiun']] = $q['id_stasiun'];

			return $result;
		}
	}

?>