<?php
	class Peminjaman_model extends CI_Model{

		public function add_peminjaman($data){
			$nokartu = $this->get_no_kartu();
			$idstasiun = $this->get_id_stasiun($data['sepeda']);
			$sql = 'INSERT INTO peminjaman Values (?,?,?,?, NULL, NULL, NULL)';
			$query = $this->db->query($sql, array($nokartu, $data['datetime_pinjam'], $data['sepeda'], $idstasiun));

			//UPDATE SEPEDA
			$sql2 = 'UPDATE sepeda SET status = FALSE WHERE nomor = ?';
			$query2 = $this->db->query($sql2, array($data['sepeda']));
			return true;
		}

		public function pengembalian($data){
			 $tot = $this->count_biaya($data['datetime_pinjam'], $data['datetime_kembali']);
			 //print_r($tot);
			 $totInt = (int)$tot;
			// if($totInt <= 10){
			//	$biaya = 1000 * ($totInt + 1);
			// }
			// else{
			//	$biaya = 10000;
			 //}
			$biaya = 1000 * ($totInt + 1);
			// print_r($data['datetime_pinjam']);
			// print_r($data['datetime_kembali']);
			$sql = 'UPDATE peminjaman SET biaya = ?, datetime_kembali = ? WHERE no_kartu_anggota = ? and datetime_pinjam = ? and nomor_sepeda = ? and id_stasiun = ?';
			$query = $this->db->query($sql, array($biaya, $data['datetime_kembali'], $data['no_kartu_anggota'], $data['datetime_pinjam'], $data['nomor_sepeda'], $data['id_stasiun']));

			//UPDATE SEPEDA
			$sql2 = 'UPDATE sepeda SET status = TRUE WHERE nomor = ?';
			$query2 = $this->db->query($sql2, array($data['nomor_sepeda']));
			return true;
		}

		public function get_all_peminjaman(){
			$role = $this->session->userdata('role');

			if ($role == 'Admin' || $role == 'Petugas'){
				$sql = 'SELECT a.no_kartu_anggota, nomor, merk, a.id_stasiun, nama, datetime_pinjam, datetime_kembali, biaya, denda FROM peminjaman a, sepeda b, stasiun c WHERE a.nomor_sepeda = b.nomor and a.id_stasiun = c.id_stasiun ORDER BY datetime_pinjam desc';
				$query = $this->db->query($sql);
			}
			else if ($role == 'Anggota'){
				$nokartu = $this->get_no_kartu();
				$sql = 'SELECT a.no_kartu_anggota, nomor, merk, a.id_stasiun, nama, datetime_pinjam, datetime_kembali, biaya, denda FROM peminjaman a, sepeda b, stasiun c WHERE a.nomor_sepeda = b.nomor and a.id_stasiun = c.id_stasiun and a.no_kartu_anggota = ? ORDER BY datetime_pinjam desc';
				$query = $this->db->query($sql, array($nokartu));
			}
			return $result = $query->result_array();
		}

		public function get_no_kartu(){
			$ktp = $this->session->userdata('ktp');
			$sql = 'SELECT no_kartu FROM anggota a, person b WHERE a.ktp = b.ktp AND a.ktp = ?';
			$query = $this->db->query($sql, array($ktp));
			$result = $query->row_array();
			return $result['no_kartu'];
		}

		public function count_biaya($prm1, $prm2){
			//$datetime1 = new DateTime($prm1);
			//$datetime2 = new DateTime($prm2);

			//$interval = $datetime1->diff($datetime2);
			//return $interval->format('%h');
			$datetime1 = new DateTime($prm1);
			$datetime2 = new DateTime($prm2);
			$interval = date_diff($datetime1, $datetime2);
 			$days = $interval->days;
  			$hours=$interval->format('%h');
			$total = ($days * 24) + $hours;
			return $total;
		}

		public function get_id_stasiun($id){
			$sql = 'SELECT id_stasiun FROM sepeda WHERE nomor = ?';
			$query = $this->db->query($sql, array($id));
			$result = $query->row_array();
			return $result['id_stasiun'];
		}
	}
?>