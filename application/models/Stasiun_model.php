<?php
	class Stasiun_model extends CI_Model{

		public function add_stasiun($data){
			$sql = 'INSERT INTO stasiun Values (?,?,?,?,?)';
			$query = $this->db->query($sql, array($this->getLastIDStasiun(), $data['alamat'], $data['lat'], $data['long'], $data['nama']));
			return true;
		}

		public function get_all_stasiun(){
			$query = $this->db->query('SELECT * FROM stasiun ORDER BY id_stasiun asc');
			return $result = $query->result_array();
		}

		public function get_list_stasiun(){
			$query = $this->db->query('SELECT * FROM stasiun ORDER BY id_stasiun asc');
			$exec = $query->result_array();

			$result = array();
			foreach($exec as $q)
			$result[$q['id_stasiun']] = $q['id_stasiun'] . ' - ' . $q['nama'];

			return $result;
		}

		public function get_stasiun_by_id($id){
			$sql = 'SELECT * FROM stasiun WHERE id_stasiun = ?';
			$query = $this->db->query($sql, array($id));
			return $result = $query->row_array();
		}

		public function edit_stasiun($data, $id){
			$sql = 'UPDATE stasiun SET alamat = ?, lat = ?, long = ?, nama = ? WHERE id_stasiun = ?';
			$query = $this->db->query($sql, array($data['alamat'], $data['lat'], $data['long'], $data['nama'], $id));
			return true;
		}

		public function getLastIDStasiun() 
		{
			$this->db->select('SUBSTR(id_stasiun, 4) as id', FALSE);
			$this->db->order_by('id_stasiun', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('stasiun');
			if($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id) + 1;
			}
			else {
				$kode = 1;
			}
			$kodemax = 'STA' . str_pad($kode, 7, 0, STR_PAD_LEFT); 
			return $kodemax;
		}
	}

?>