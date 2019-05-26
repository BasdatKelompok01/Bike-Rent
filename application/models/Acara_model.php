<?php
	class Acara_model extends CI_Model{

		public function add_acara($data){
			$sql = 'INSERT INTO acara Values (?,?,?,?,?,?)';
			$idnew = $this->getLastIDAcara();
			$query = $this->db->query($sql, array($idnew, $data['judul'], $data['deskripsi'], $data['tgl_mulai'], $data['tgl_akhir'], ($data['is_free'] == 1 ? TRUE : FALSE) ));
			return $idnew;
		}

		public function get_all_acara(){
			$query = $this->db->query('SELECT * FROM acara a ORDER BY id_acara asc');
			return $result = $query->result_array();
		}

		public function get_acara_by_id($id){
			$sql = 'SELECT * FROM acara WHERE id_acara = ?';
			$query = $this->db->query($sql, array($id));
			return $result = $query->row_array();
		}

		public function edit_acara($data, $id){
			$sql1 = 'DELETE FROM acara_stasiun WHERE id_acara = ?';
			$this->db->query($sql1, array($id));

			$sql = 'UPDATE acara SET judul = ?, deskripsi = ?, tgl_mulai = ?, tgl_akhir = ?, is_free = ? WHERE id_acara = ?';
			$query = $this->db->query($sql, array($data['judul'], $data['deskripsi'], $data['tgl_mulai'], $data['tgl_akhir'], ($data['is_free'] == 1 ? TRUE : FALSE), $id));
			return true;
		}

		public function getLastIDAcara() 
		{
			$this->db->select('SUBSTR(id_acara, 4) as id', FALSE);
			$this->db->order_by('id_acara', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('acara');
			if($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id) + 1;
			}
			else {
				$kode = 1;
			}
			$kodemax = 'ACA' . str_pad($kode, 7, 0, STR_PAD_LEFT); 
			return $kodemax;
		}
	}

?>