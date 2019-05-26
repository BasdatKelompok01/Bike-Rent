<?php
	class Sepeda_model extends CI_Model{

		public function add_sepeda($data){
			$sql = 'INSERT INTO sepeda Values (?,?,?,?,?,?)';
			$idnew = $this->getLastIDSepeda();
			$query = $this->db->query($sql, array($idnew, $data['merk'], $data['jenis'], ($data['status'] == 1 ? TRUE : FALSE), $data['stasiun'], $data['penyumbang'] ));
			return $idnew;
		}

		public function get_all_sepeda(){
			$query = $this->db->query('SELECT nomor, merk, jenis, b.nama as stasiun, a.status, d.nama as penyumbang FROM sepeda a, stasiun b, anggota c, person d WHERE a.id_stasiun = b.id_stasiun and a.no_kartu_penyumbang = c.no_kartu and c.ktp = d.ktp ORDER BY nomor asc');
			return $result = $query->result_array();
		}

		public function get_list_sepeda(){
			$query = $this->db->query('SELECT * FROM sepeda a, stasiun b WHERE a.id_stasiun = b.id_stasiun and status = TRUE ORDER BY nomor asc');
			$exec = $query->result_array();

			$result = array();
			foreach($exec as $q)
			$result[$q['nomor']] = $q['nomor'] . ' ' . $q['merk'] . ' - ' . $q['id_stasiun'] . ' ' . $q['nama'];

			return $result;
		}

		public function get_sepeda_by_id($id){
			$sql = 'SELECT * FROM sepeda WHERE nomor = ?';
			$query = $this->db->query($sql, array($id));
			return $result = $query->row_array();
		}

		public function get_selected_stasiun($id){
			$sql = 'SELECT * FROM sepeda a, stasiun b WHERE a.id_stasiun = b.id_stasiun and nomor = ?';
			$query = $this->db->query($sql, array($id));
			$exec = $query->result_array();
			$result = array();
			foreach($exec as $q)
			$result[$q['id_stasiun']] = $q['id_stasiun'];

			return $result;
		}

		public function get_selected_anggota($id){
			$sql = 'SELECT * FROM sepeda a, anggota b, person c WHERE a.no_kartu_penyumbang = b.no_kartu and b.ktp = c.ktp and nomor = ?';
			$query = $this->db->query($sql, array($id));
			$exec = $query->result_array();
			$result = array();
			foreach($exec as $q)
			$result[$q['no_kartu_penyumbang']] = $q['no_kartu_penyumbang'];

			return $result;
		}

		public function edit_sepeda($data, $id){
			$sql = 'UPDATE sepeda SET merk = ?, jenis = ?, status = ?, id_stasiun = ?, no_kartu_penyumbang = ? WHERE nomor = ?';
			$query = $this->db->query($sql, array($data['merk'], $data['jenis'], ($data['status'] == 1 ? TRUE : FALSE), $data['stasiun'], $data['penyumbang'], $id));
			return true;
		}

		public function getLastIDSepeda() 
		{
			$this->db->select('SUBSTR(nomor, 4) as id', FALSE);
			$this->db->order_by('nomor', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('sepeda');
			if($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id) + 1;
			}
			else {
				$kode = 1;
			}
			$kodemax = 'SPD' . str_pad($kode, 7, 0, STR_PAD_LEFT); 
			return $kodemax;
		}
	}

?>