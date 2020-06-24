<?php

class Tingkatan extends CI_Controller{

	public function index()
	{
		$data['tingkatan']	=$this->tingkatan_model->tampil_data()->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/tingkatan',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data = array(
			'id_tingkatan'		=> set_value('id_tingkatan'),
			'kode_tingkatan'	=> set_value('kode_tingkatan'),
			'nama_tingkatan'	=> set_value('nama_tingkatan'),
		);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/tingkatan_form',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->input();
		}else {
			$data = array(
				'kode_tingkatan'	=> $this->input->post('kode_tingkatan', TRUE),
				'nama_tingkatan'	=> $this->input->post('nama_tingkatan', TRUE),
			);

			$this->tingkatan_model->input_data($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Tingkatan Berhasil di Tambahkan!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/tingkatan');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_tingkatan','kode_tingkatan', 'required',[
			'required'	=> 'Kode Tingkatan Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_tingkatan','nama_tingkatan', 'required',[
			'required'	=> 'Nama Tingkatan Wajib di Isi!'
		]);
	}

	public function update($id)
	{
		$where = array('id_tingkatan' => $id);
		$data['tingkatan'] = $this->tingkatan_model->edit_data($where,'tingkatan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/tingkatan_update',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id_tingkatan');
		$kode_tingkatan = $this->input->post('kode_tingkatan');
		$nama_tingkatan = $this->input->post('nama_tingkatan');

		$data = array(
			'kode_tingkatan' => $kode_tingkatan,
			'nama_tingkatan' => $nama_tingkatan
		);

		$where  = array(
			'id_tingkatan' => $id
		);

		$this->tingkatan_model->update_data($where,$data,'tingkatan');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Tingkatan Berhasil di Update!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		redirect('administrator/tingkatan');
	}

	public function delete($id)
	{
		$where = array('id_tingkatan' => $id);
		$this->tingkatan_model->hapus_data($where,'tingkatan');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Tingkatan Berhasil di Hapus!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		redirect('administrator/tingkatan');
	}
}