<?php


class Jadwal_model extends CI_model{

	public $table 	= 'jadwal';
	public $id		= 'id_jadwal';

	public function baca_jadwal($id_kelas)
	{	

		$query = $this->db->query("Select j.id_kelas, a.tahun_akademik, m.kode_matapelajaran,k.id_kelas, k.kode_kelas, g.nama_guru, j.hari, j.jam_mulai, j.jam_selesai from jadwal_new as j, tahun_akademik as a, matapelajaran as m, kelas as k, guru as g where j.id_thn_akad = a.id_thn_akad and j.id_matapelajaran = m.id_matapelajaran and  j.id_guru = g.id_guru and j.id_kelas = '$id_kelas' ")->result();


		return $query;		
	}
	
	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}
}