<?php
	class Penugasan_model extends CI_Model{

		public function add_penugasan($data){
			$sql = 'INSERT INTO penugasan Values (?,?,?,?)';
			$query = $this->db->query($sql, array($data['petugas'], $data['tglMulai'], $data['stasiun'], $data['tglSelesai'] ));

			//UPDATE GAJI
			$datetime1 = new DateTime($data['tglMulai']);
			$datetime2 = new DateTime($data['tglSelesai']);
			$interval = date_diff($datetime1, $datetime2);
 			$days = $interval->days;
  			$hours=$interval->format('%h');
			$total = ($days * 24) + $hours;

			$newGaji = ($total + 1) * 30000;
			$sql2 = 'UPDATE petugas set gaji = ? where ktp = ?';
			$query2 = $this->db->query($sql2, array($newGaji, $data['petugas'] ));

			return true;
			// print_r($query);
		}

		public function get_all_penugasan(){
			$query = $this->db->query('SELECT a.ktp, b.nama as namapetugas, start_datetime, end_datetime, a.id_stasiun, c.nama as namastasiun FROM penugasan a, person b, stasiun c WHERE a.ktp = b.ktp and a.id_stasiun = c.id_stasiun ORDER BY start_datetime desc');
			return $result = $query->result_array();
		}

		public function get_penugasan_by_id($id, $id2, $id3){
			$sql = 'SELECT * FROM penugasan WHERE ktp = ? and start_datetime = ? and id_stasiun = ?';
			$query = $this->db->query($sql, array($id, str_replace("%20"," ",$id2), $id3));
			return $result = $query->row_array();
		}

		public function get_selected_stasiun($id1, $id2, $id3){
			$sql = 'SELECT * FROM penugasan a, stasiun b WHERE a.id_stasiun = b.id_stasiun and a.ktp = ? and start_datetime = ? and a.id_stasiun = ?';
			$query = $this->db->query($sql, array($id1, str_replace("%20"," ",$id2), $id3));
			$exec = $query->result_array();
			$result = array();
			foreach($exec as $q)
			$result[$q['id_stasiun']] = $q['id_stasiun'];

			return $result;
		}

		public function get_selected_petugas($id1, $id2, $id3){
			$sql = 'SELECT * FROM penugasan a, person b WHERE a.ktp = b.ktp and a.ktp = ? and start_datetime = ? and id_stasiun = ?';
			$query = $this->db->query($sql, array($id1, str_replace("%20"," ",$id2), $id3));
			$exec = $query->result_array();
			$result = array();
			foreach($exec as $q)
			$result[$q['ktp']] = $q['ktp'];

			return $result;
		}

		public function edit_penugasan($data, $id1, $id2, $id3){
			$sql = 'UPDATE penugasan SET ktp = ?, start_datetime = ?, end_datetime = ?, id_stasiun = ? WHERE ktp = ? and start_datetime = ? and id_stasiun = ?';
			$query = $this->db->query($sql, array($data['petugas'], $data['tglMulai'], $data['tglSelesai'], $data['stasiun'], $id1, str_replace("%20"," ",$id2), $id3));
			
			//UPDATE GAJI
			$datetime1 = new DateTime($data['tglMulai']);
			$datetime2 = new DateTime($data['tglSelesai']);
			$interval = date_diff($datetime1, $datetime2);
 			$days = $interval->days;
  			$hours=$interval->format('%h');
			$total = ($days * 24) + $hours;

			$newGaji = ($total + 1) * 30000;
			$sql2 = 'UPDATE petugas set gaji = ? where ktp = ?';
			$query2 = $this->db->query($sql2, array($newGaji, $data['petugas'] ));

			return true;
		}
	}

?>