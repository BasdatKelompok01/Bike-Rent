<?php
	class Transaksi_model extends CI_Model{

		public function add_transaksi_topup($data){
			$nokartu = $this->get_no_kartu();
			$sql = 'INSERT INTO transaksi Values (?,?,?,?)';
			$query = $this->db->query($sql, array($nokartu, $data['datetime_now'], 'Topup', $data['nominal']));
			return true;
		}

		public function get_all_transasi_by_ktp(){
			$nokartu = $this->get_no_kartu();
			$sql = 'SELECT a.date_time, jenis, (nominal - (case when denda is null then 0 else denda end)) as total FROM transaksi a LEFT JOIN transaksi_khusus_peminjaman b ON a.no_kartu_anggota = b.no_kartu_anggota and a.date_time = b.date_time LEFT JOIN peminjaman c ON b.no_kartu_peminjam = c.no_kartu_anggota and b.datetime_pinjam = c.datetime_pinjam and b.no_sepeda = c.nomor_sepeda and b.id_stasiun = c.id_stasiun WHERE a.no_kartu_anggota = ? ORDER BY date_time desc';
			$query = $this->db->query($sql, array($nokartu));
			return $result = $query->result_array();
		}

		public function get_no_kartu(){
			$ktp = $this->session->userdata('ktp');
			$sql = 'SELECT no_kartu FROM anggota a, person b WHERE a.ktp = b.ktp AND a.ktp = ?';
			$query = $this->db->query($sql, array($ktp));
			$result = $query->row_array();
			return $result['no_kartu'];
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