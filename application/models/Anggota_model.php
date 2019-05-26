<?php
	class Anggota_model extends CI_Model{



		public function get_all_anggota(){
			$query = $this->db->query('SELECT * FROM anggota ORDER BY no_kartu asc');
			return $result = $query->result_array();
		}

		public function get_list_anggota(){
			$query = $this->db->query('SELECT no_kartu, nama FROM anggota a, person b where a.ktp = b.ktp ORDER BY no_kartu asc');
			$exec = $query->result_array();

			$result = array();
			foreach($exec as $q)
			$result[$q['no_kartu']] = $q['nama'];

			return $result;
		}

		public function get_stasiun_by_id($id){
			$sql = 'SELECT * FROM stasiun WHERE id_stasiun = ?';
			$query = $this->db->query($sql, array($id));
			return $result = $query->row_array();
		}
	}

?>