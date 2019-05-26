<?php
	class Petugas_model extends CI_Model{



		public function get_all_petugas(){
			$query = $this->db->query('SELECT * FROM petugas ORDER BY ktp asc');
			return $result = $query->result_array();
		}

		public function get_list_petugas(){
			$query = $this->db->query('SELECT a.ktp, nama FROM petugas a, person b where a.ktp = b.ktp ORDER BY a.ktp asc');
			$exec = $query->result_array();

			$result = array();
			foreach($exec as $q)
			$result[$q['ktp']] = $q['ktp'] . ' - ' . $q['nama'];

			return $result;
		}
	}

?>