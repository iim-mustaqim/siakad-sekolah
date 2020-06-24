<?php

class Matapelajaran extends CI_Controller{

	public function index()
	{
		$data['matapelajaran'] = $this->matapelajaran_model->tampil_data('matapelajaran')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/matapelajaran',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_matapelajaran()
	{
		$data['kelas'] = $this->matapelajaran_model->tampil_data('kelas')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/matapelajaran_form',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_matapelajaran_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_matapelajaran();
		}else{
			$kode_matapelajaran 	= $this->input->post('kode_matapelajaran');			
			$nama_matapelajaran 	= $this->input->post('nama_matapelajaran');
			$sks 					= $this->input->post('sks');
			$nama_guru				= $this->input->post('nama_guru');
			$semester 				= $this->input->post('semester');
			$nama_kelas 			= $this->input->post('nama_kelas');

			$data = array (
				'kode_matapelajaran'	=> $kode_matapelajaran,
				'nama_matapelajaran'	=> $nama_matapelajaran,
				'sks'					=> $sks,
				'nama_guru'				=> $nama_guru,
				'semester'				=> $semester,
				'nama_kelas'			=> $nama_kelas,
			);

			$this->matapelajaran_model->insert_data($data,'matapelajaran');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Mata Pelajaran Berhasil di Tambahkan!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/matapelajaran');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_matapelajaran','nama mata pelajaran', 'required',[
			'required'	=> 'Kode Mata Pelajaran Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_matapelajaran','nama mata pelajaran', 'required',[
			'required'	=> 'Nama Mata Pelajaran Wajib di Isi!'
		]);
		$this->form_validation->set_rules('sks','sks', 'required',[
			'required'	=> 'SKS Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_guru','nama_guru', 'required',[
			'required'	=> 'Nama Guru Wajib di Isi!'
		]);
		$this->form_validation->set_rules('semester','semester', 'required',[
			'required'	=> 'Semester Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_kelas','nama kelas', 'required',[
			'required'	=> 'Nama Kelas Wajib di Isi!'
		]);
	}

	public function detail($kode)
	{
		$data['detail'] = $this->matapelajaran_model->ambil_kode_matapelajaran($kode);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/matapelajaran_detail',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function update($id)
	{
		$where = array ('kode_matapelajaran' => $id);

		$data['matapelajaran'] 	= $this->db->query("SELECT * FROM matapelajaran mp,kelas kls WHERE mp.nama_kelas=kls.nama_kelas AND mp.kode_matapelajaran='$id'")->result();
		$data['kelas'] 			= $this->matapelajaran_model->tampil_data('kelas')->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/matapelajaran_update',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_aksi()
	{
		$id 					= $this->input->post('kode_matapelajaran');
		$kode_matapelajaran 	= $this->input->post('kode_matapelajaran');
		$nama_matapelajaran 	= $this->input->post('nama_matapelajaran');
		$sks 					= $this->input->post('sks');
		$nama_guru 				= $this->input->post('nama_guru');
		$semester 				= $this->input->post('semester');
		$nama_kelas 			= $this->input->post('nama_kelas');

		$data = array(
			'kode_matapelajaran'	=> $kode_matapelajaran,
			'nama_matapelajaran'	=> $nama_matapelajaran,
			'sks' 					=> $sks,
			'nama_guru' 			=> $nama_guru,
			'semester' 				=> $semester,
			'nama_kelas' 			=> $nama_kelas,
		);

		$where  = array(
			'kode_matapelajaran' => $id
		);

		$this->matapelajaran_model->update_data($where,$data,'matapelajaran');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Mata Pelajaran Berhasil di Update!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		redirect('administrator/matapelajaran');
	}

	public function delete($id)
	{
		$where = array('kode_matapelajaran' => $id);
		$this->matapelajaran_model->hapus_data($where,'matapelajaran');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Mata Pelajaran Berhasil di Hapus!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		redirect('administrator/matapelajaran');
	}
}