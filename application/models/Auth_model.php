<?php
	class Auth_model extends CI_Model{

		public function login($data){
			$sql = 'SELECT * FROM person where ktp=? AND email=?';
   			$query=$this->db->query($sql, array($data['nomorKTP'], $data['email']));
			
			if($query->num_rows() > 0) {
				$sql1 = 'SELECT * FROM person a join petugas b on a.ktp = b.ktp where a.ktp=? AND email=?';
				$query1=$this->db->query($sql1, array($data['nomorKTP'], $data['email']));
				$row1 = $query1->row();

				$sql2 = 'SELECT * FROM person a join anggota b on a.ktp = b.ktp where a.ktp=? AND email=?';
				$query2=$this->db->query($sql2, array($data['nomorKTP'], $data['email']));
				$row2 = $query2->row();	
				
				//print_r($query->num_rows());
				if($query1->num_rows() > 0) {
					return $result = array(
						'ktp' => $row1->ktp,
						'nama' => $row1->nama,
						'role' => 'Petugas'
						);
				}
				else if($query2->num_rows() > 0) {
					return $result = array(
						'ktp' => $row2->ktp,
						'nama' => $row2->nama,
						'role' => 'Anggota'
						);
				}
				else {
					return false;
				}
			}
			else if ($data['email'] == 'admin@bikerent.com' && $data['nomorKTP'] == '1234567890123456') {
				return $result = array(
					'ktp' => '1234567890123456',
					'nama' => 'Administrator',
					'role' => 'Admin'
					);
			}
			else {
				return false;
			}
		}

		public function register($data){
			$sql = 'INSERT INTO person Values (?,?,?,?,?,?)';
			$query = $this->db->query($sql, array($data['nomorKTP'], $data['email'], $data['namaLengkap'], $data['alamat'], $data['tglLahir'], $data['nomorTelepon']));

			if($data['role'] == 'Anggota'){
				$sql = 'INSERT INTO anggota Values (?,?,?,?)';
				$query = $this->db->query($sql, array($this->getLastIDAnggota(), 0, 0, $data['nomorKTP']));
				return $result = array(
					'nama' => $data['namaLengkap'],
					'role' => 'Anggota'
					);
			}
			if($data['role'] == 'Petugas'){
				$sql = 'INSERT INTO petugas Values (?,?)';
				$query = $this->db->query($sql, array($data['nomorKTP'], 30000));
				return $result = array(
					'nama' => $data['namaLengkap'],
					'role' => 'Petugas'
					);
			}
			else {
				return false;
			}
		}

		public function checkKTPEmail($data){
			$sql = 'SELECT * FROM person where ktp=?';
			$query = $this->db->query($sql, array($data['nomorKTP']));
			
			$sql2 = 'SELECT * FROM person where email=?';
			$query2 = $this->db->query($sql2, array($data['email']));
			   
			if($query->num_rows() > 0) {
				return "Maaf, Nomor KTP telah terdaftar dalam sistem.";				
			}
			else if($query2->num_rows() > 0) {
				return "Maaf, Email telah terdaftar dalam sistem.";				
			}
			else {
				return false;
			}
		}

		public function getLastIDAnggota() 
		{
			$this->db->select('SUBSTR(no_kartu, 4) as id', FALSE);
			$this->db->order_by('no_kartu', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('anggota');
			if($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id) + 1;
			}
			else {
				$kode = 1;
			}
			$kodemax = 'ANG' . str_pad($kode, 7, 0, STR_PAD_LEFT); 
			return $kodemax;
		}
	}
?>