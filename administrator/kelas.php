<?php

class Kelas extends CI_Controller{

	public function index()
	{
		$data['kelas'] = $this->kelas_model->tampil_data('kelas')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/kelas',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_kelas()
	{
		$data['tingkatan']	=$this->kelas_model->tampil_data('tingkatan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/kelas_form',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_kelas_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_kelas();
		}else{
			$kode_kelas 	= $this->input->post('kode_kelas');			
			$nama_kelas 	= $this->input->post('nama_kelas');
			$nama_tingkatan = $this->input->post('nama_tingkatan');
			$nama_wali 		= $this->input->post('nama_wali');

			$data = array(
				'kode_kelas'		=> $kode_kelas,
				'nama_kelas'		=> $nama_kelas,
				'nama_tingkatan'	=> $nama_tingkatan,
				'nama_wali'			=> $nama_wali
			);

			$this->kelas_model->insert_data($data,'kelas');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Kelas Berhasil di Tambahkan!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/kelas');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_kelas','kode_kelas', 'required',[
			'required'	=> 'Kode Kelas Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_kelas','nama_kelas', 'required',[
			'required'	=> 'Nama Kelas Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_tingkatan','nama_tingkatan', 'required',[
			'required'	=> 'Nama Tingkatan Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_wali','nama_wali', 'required',[
			'required'	=> 'Nama Wali Kelas Wajib di Isi!'
		]);
	}

	public function update($id)
	{
		$where = array ('id_kelas' => $id);

		$data['kelas'] = $this->db->query("SELECT * FROM kelas kls,tingkatan tkt WHERE kls.nama_tingkatan=tkt.nama_tingkatan AND kls.id_kelas='$id'")->result();
		$data['tingkatan'] = $this->kelas_model->tampil_data('tingkatan')->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/kelas_update',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id_kelas');
		$kode_kelas = $this->input->post('kode_kelas');
		$nama_kelas = $this->input->post('nama_kelas');
		$nama_tingkatan = $this->input->post('nama_tingkatan');
		$nama_wali = $this->input->post('nama_wali');

		$data = array(
			'kode_kelas' => $kode_kelas,
			'nama_kelas' => $nama_kelas,
			'nama_tingkatan' => $nama_tingkatan,
			'nama_wali' => $nama_wali
		);

		$where  = array(
			'id_kelas' => $id
		);

		$this->kelas_model->update_data($where,$data,'kelas');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Kelas Berhasil di Update!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		redirect('administrator/kelas');
	}

	public function delete($id)
	{
		$where = array('id_kelas' => $id);
		$this->kelas_model->hapus_data($where,'kelas');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Kelas Berhasil di Hapus!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		redirect('administrator/kelas');
	}
}