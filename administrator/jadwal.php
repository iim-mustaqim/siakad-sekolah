<?php

class Jadwal extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('jadwal_model');


	}
	public function index()
	{
		$data = array(
			'kode_tingkatan' 		=> set_value('kode_tingkatan'),
			'nama_kelas'			=> set_value('nama_kelas'),
			'id_thn_akad' 			=> set_value('id_thn_akad'),

		);

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/masuk_jadwal',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function jadwal_aksi()
	{
		$this->_rulesJadwal();
		
		if ($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$kode_tingkatan 	= $this->input->post('kode_tingkatan', TRUE);
			$nama_kelas 		= $this->input->post('nama_kelas', TRUE);
			$thn_akad 			= $this->input->post('id_thn_akad', TRUE);
		}

		if($this->tingkatan_model->get_by_id($kode_tingkatan)==null)
		{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Data Tingkatan Yang Anda Input Belum Terdaftar!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/jadwal');
		}

		if($this->kelas_model->get_by_id($nama_kelas)==null)
		{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Data Kelas Yang Anda Input Belum Terdaftar!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/jadwal');
		}


		$dataJadwal = array(
			 
			'kode_tingkatan'	=> $kode_tingkatan,
			'nama_kelas'		=> $nama_kelas,
			'id_thn_akad'		=> $thn_akad,
			'nama_tingkatan' 	=> $this->tingkatan_model->get_by_id($kode_tingkatan)->nama_tingkatan,
			'nama_wali' 		=> $this->kelas_model->get_by_id($nama_kelas)->nama_wali,
			'tahun_akademik'	=> $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
			'semester'			=> $this->tahunakademik_model->get_by_id($thn_akad)->semester==1?'Ganjil':'Genap',
			'status'			=> $this->tahunakademik_model->get_by_id($thn_akad)->status==1?'Tidak Aktif':'Aktif',
			'kode_matapelajaran'=> set_value('kode_matapelajaran'),
		);
		$nama_kelas = $dataJadwal['nama_kelas'];
		$query = $this->db->query("Select * from kelas where kelas.nama_kelas = '$nama_kelas'")->result_array();
		$id_kelas = $query[0]['id_kelas'];
		
		$data['jadwal_data'] = $this->jadwal_model->baca_jadwal($id_kelas);
	

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/jadwal_list',$data);
		$this->load->view('templates_administrator/footer');
	
		

	}

	

	public function _rulesJadwal()
	{
		$this->form_validation->set_rules('kode_tingkatan','kode_tingkatan','required',[
			'required'	=> 'Kode Tingkatan Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_kelas','nama_kelas','required',[
			'required'	=> 'Nama Kelas Wajib di Isi!'
		]);
		$this->form_validation->set_rules('id_thn_akad','id_thn_akad','required',[
			'required'	=> 'Tahun Akademik Wajib di Isi!'
		]);
	}

	public function tambah_jadwal($kode_tingkatan,$nama_kelas,$thn_akad)
	{
		$data = array(
			'id_jadwal'			=> set_value('id_jadwal'),
			'kode_tingkatan' 	=> $kode_tingkatan,
			'nama_kelas' 		=> $nama_kelas,
			'id_thn_akad' 		=> $thn_akad,
			'tahun_akademik'	=> $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
			'semester'			=> $this->tahunakademik_model->get_by_id($thn_akad)->semester==1?'Ganjil':'Genap',
			'status'			=> $this->tahunakademik_model->get_by_id($thn_akad)->status==1?'Tidak Aktif':'Aktif',
			'nama_tingkatan' 	=> $this->tingkatan_model->get_by_id($kode_tingkatan)->nama_tingkatan,
			'nama_wali' 		=> $this->kelas_model->get_by_id($nama_kelas)->nama_wali,
			'kode_matapelajaran'=> set_value('kode_matapelajaran'),
		);

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/jadwal_form',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_jadwal_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_jadwal(
				$this->input->post('kode_tingkatan',TRUE),
				$this->input->post('nama_kelas',TRUE),
				$this->input->post('id_thn_akad',TRUE),
				$this->input->post('nama_wali',TRUE)
			);
		}else{
			$kode_tingkatan		= $this->input->post('kode_tingkatan',TRUE);
			$nama_kelas			= $this->input->post('nama_kelas',TRUE);
			$id_thn_akad		= $this->input->post('id_thn_akad',TRUE);
			$nama_wali			= $this->input->post('nama_wali',TRUE);
			$hari 				= $this->input->post('hari');
			$kode_matapelajaran	= $this->input->post('kode_matapelajaran');
			$jam_mulai 			= $this->input->post('jam_mulai');
			$jam_selesai 		= $this->input->post('jam_selesai');
			$nama_guru 			= $this->input->post('nama_guru');

			$data = array(
			'kode_tingkatan' 	=> $kode_tingkatan,
			'nama_kelas' 		=> $nama_kelas,
			'id_thn_akad' 		=> $id_thn_akad,
			'nama_wali' 		=> $nama_wali,
			'hari'				=> $hari,
			'kode_matapelajaran'=> $kode_matapelajaran,			
			'jam_mulai'			=> $jam_mulai,
			'jam_selesai'		=> $jam_selesai,
			'nama_guru'			=> $nama_guru,
			);

			$this->jadwal_model->insert($data,'jadwal');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Jadwal Berhasil Ditambahkan!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/jadwal/index');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_tingkatan','kode_tingkatan','required',[
			'required'	=> 'Kode Tingkatan Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_kelas','nama_kelas','required',[
			'required'	=> 'Nama Kelas Wajib di Isi!'
		]);
		$this->form_validation->set_rules('id_thn_akad','id_thn_akad','required',[
			'required'	=> 'Tahun Akademik Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_wali','nama_wali','required',[
			'required'	=> 'Nama Wali Kelas Wajib di Isi!'
		]);
		$this->form_validation->set_rules('hari','hari','required',[
			'required'	=> 'Hari Wajib di Isi!'
		]);
		$this->form_validation->set_rules('kode_matapelajaran','kode_matapelajaran','required',[
			'required'	=> 'Mata Pelajaran Wajib di Isi!'
		]);
		$this->form_validation->set_rules('jam_mulai','jam_mulai','required',[
			'required'	=> 'Jam Mulai Wajib di Isi!'
		]);
		$this->form_validation->set_rules('jam_selesai','jam_selesai','required',[
			'required'	=> 'Jam Selesai Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_guru','nama_guru','required',[
			'required'	=> 'Nama Guru Wajib di Isi!'
		]);
	}
}