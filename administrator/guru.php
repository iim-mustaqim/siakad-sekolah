<?php

class Guru extends CI_Controller{

	public function index()
	{
		$data['guru'] = $this->guru_model->tampil_data('guru')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/guru',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function detail($id)
	{
		$data['detail'] = $this->guru_model->ambil_id_guru($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/guru_detail',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_guru()
	{
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/guru_form');
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_guru_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_guru();
		}else{
			$nign 					= $this->input->post('nign');			
			$nama_guru 				= $this->input->post('nama_guru');
			$alamat					= $this->input->post('alamat');
			$jenis_kelamin 			= $this->input->post('jenis_kelamin');
			$tempat_lahir 			= $this->input->post('tempat_lahir');
			$tanggal_lahir 			= $this->input->post('tanggal_lahir');
			$nama_matapelajaran 	= $this->input->post('nama_matapelajaran');
			$email 					= $this->input->post('email');
			$telp 					= $this->input->post('telp');
			$photo 					= $_FILES['photo'];
			if ($photo=''){}else{
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|gif|tiff';

				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('photo')){
					echo "Gagal Upload"; die();
				}else{
					$photo=$this->upload->data('file_name');
				}
			}

			$data = array (
				'nign'					=> $nign,
				'nama_guru'				=> $nama_guru,
				'alamat'				=> $alamat,
				'jenis_kelamin' 		=> $jenis_kelamin,
				'tempat_lahir'			=> $tempat_lahir,
				'tanggal_lahir' 		=> $tanggal_lahir,
				'nama_matapelajaran' 	=> $nama_matapelajaran,
				'email' 				=> $email,
				'telp'					=> $telp,
				'photo' 				=> $photo

			);

			$this->guru_model->insert_data($data,'guru');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Guru Berhasil di Tambahkan!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/guru');
		}
	}

	public function update($id)
	{
		$where = array ('nign' => $id);
		$data['guru'] = $this->guru_model->edit_data($where,'guru')->result();
		$data['detail'] = $this->guru_model->ambil_id_guru($id);

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/guru_update',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_guru_aksi()
	{
		$this->_rules();

		if($this->form_validation->run()== FALSE)
		{
			$this->update();
		}else{
			$id 					= $this->input->post('id_guru');
			$nign 					= $this->input->post('nign');			
			$nama_guru 				= $this->input->post('nama_guru');
			$alamat					= $this->input->post('alamat');
			$jenis_kelamin 			= $this->input->post('jenis_kelamin');
			$tempat_lahir 			= $this->input->post('tempat_lahir');
			$tanggal_lahir 			= $this->input->post('tanggal_lahir');
			$nama_matapelajaran 	= $this->input->post('nama_matapelajaran');
			$email 					= $this->input->post('email');
			$telp 					= $this->input->post('telp');
			$photo 					= $_FILES['userfile']['name'];

			if ($photo){
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|gif|tiff';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('userfile')){
					$userfile = $this->upload->data('file_name');
					$this->db->set('photo', $userfile);
				}else{
					echo "Gagal Upload";
				}
			}

			$data = array (
				'nign'					=> $nign,
				'nama_guru'				=> $nama_guru,
				'alamat'				=> $alamat,
				'jenis_kelamin' 		=> $jenis_kelamin,
				'tempat_lahir'			=> $tempat_lahir,
				'tanggal_lahir' 		=> $tanggal_lahir,
				'nama_matapelajaran' 	=> $nama_matapelajaran,
				'email' 				=> $email,
				'telp'					=> $telp		

			);

			$where = array(
				'id_guru' => $id
			);

			$this->guru_model->update_data($where,$data,'guru');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Guru Berhasil di Update!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/guru');
		}
	}

	public function delete($id)
	{
		$where = array('nign' => $id);
		$this->guru_model->hapus_data($where,'guru');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Guru Berhasil di Hapus!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		redirect('administrator/guru');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nign','NIGN', 'required',[
			'required'	=> 'NIGN Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_guru','Nama Guru', 'required',[
			'required'	=> 'Nama Guru Wajib di Isi!'
		]);
		$this->form_validation->set_rules('alamat','Alamat', 'required',[
			'required'	=> 'Alamat Wajib di Isi!'
		]);
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin', 'required',[
			'required'	=> 'Jenis Kelamin Wajib di Isi!'
		]);
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir', 'required',[
			'required'	=> 'Tempat Lahir Wajib di Isi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir', 'required',[
			'required'	=> 'Tanggal Lahir Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_matapelajaran','Matapelajran', 'required',[
			'required'	=> 'Matapelajaran Wajib di Isi!'
		]);
		$this->form_validation->set_rules('email','Email', 'required',[
			'required'	=> 'Email Wajib di Isi!'
		]);
		$this->form_validation->set_rules('telp','Telepon', 'required',[
			'required'	=> 'No Telepon Wajib di Isi!'
		]);
	}
}