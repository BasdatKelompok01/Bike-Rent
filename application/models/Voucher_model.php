<?php
	class Voucher_model extends CI_Model{

		public function add_voucher($data){
			$sql = 'INSERT INTO voucher Values (?,?,?,?,?,NULL)';
			$idnew = $this->getLastIDVoucher();
			$query = $this->db->query($sql, array($idnew, $data['nama'], $data['kategori'], $data['nilai_poin'], $data['deskripsi'] ));
			return true;
		}

		public function get_all_voucher(){
			$query = $this->db->query('SELECT id_voucher, a.nama, kategori, nilai_poin, deskripsi, c.nama as diklaim FROM voucher a LEFT JOIN anggota b ON a.no_kartu_anggota = b.no_kartu LEFT JOIN person c ON b.ktp = c.ktp ORDER BY id_voucher asc');
			return $result = $query->result_array();
		}

		public function get_voucher_by_id($id){
			$sql = 'SELECT * FROM voucher WHERE id_voucher = ?';
			$query = $this->db->query($sql, array($id));
			return $result = $query->row_array();
		}

		public function edit_voucher($data, $id){
			$sql = 'UPDATE voucher SET nama = ?, kategori = ?, nilai_poin = ?, deskripsi = ? WHERE id_voucher = ?';
			$query = $this->db->query($sql, array($data['nama'], $data['kategori'], $data['nilai_poin'], $data['deskripsi'], $id));
			return true;
		}

		public function getLastIDVoucher() 
		{
			$this->db->select('SUBSTR(id_voucher, 4) as id', FALSE);
			$this->db->order_by('id_voucher', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('voucher');
			if($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id) + 1;
			}
			else {
				$kode = 1;
			}
			$kodemax = 'VOC' . str_pad($kode, 7, 0, STR_PAD_LEFT); 
			return $kodemax;
		}
	}

?>