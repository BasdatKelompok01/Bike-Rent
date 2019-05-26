<?php
	class Laporan_model extends CI_Model{

		public function get_all_laporan(){
			$query = $this->db->query('SELECT id_laporan, a.datetime_pinjam, nama, denda, status FROM laporan a, anggota b, person c, peminjaman d WHERE a.no_kartu_anggota = b.no_kartu and b.ktp = c.ktp and a.no_kartu_anggota = d.no_kartu_anggota and a.datetime_pinjam = d.datetime_pinjam and a.nomor_sepeda = d.nomor_sepeda and a.id_stasiun = d.id_stasiun ORDER BY datetime_pinjam desc');
			return $result = $query->result_array();
		}
	}
?>