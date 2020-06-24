<?php

class Siswa extends CI_Controller{

	public function index()
	{
		$data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();
		$data['kelas'] = $this->kelas_model->tampil_data('kelas')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function detail($id)
	{
		$data['detail'] = $this->siswa_model->ambil_id_siswa($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa_detail',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_siswa()
	{
		$data['kelas'] = $this->siswa_model->tampil_data('kelas')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa_form',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_siswa_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_siswa();
		}else{
			$NIS 					= $this->input->post('NIS');			
			$nama_lengkap 			= $this->input->post('nama_lengkap');
			$alamat					= $this->input->post('alamat');
			$email 					= $this->input->post('email');
			$telepon 				= $this->input->post('telepon');
			$tempat_lahir 			= $this->input->post('tempat_lahir');
			$tanggal_lahir 			= $this->input->post('tanggal_lahir');
			$jenis_kelamin 			= $this->input->post('jenis_kelamin');
			$nama_kelas 			= $this->input->post('nama_kelas');
			$photo 			= $_FILES['photo'];
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
				'NIS'			=> $NIS,
				'nama_lengkap'	=> $nama_lengkap,
				'alamat'		=> $alamat,
				'email' 		=> $email,
				'telepon'		=> $telepon,
				'tempat_lahir'	=> $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'jenis_kelamin' => $jenis_kelamin,
				'nama_kelas' 	=> $nama_kelas,
				'photo' 		=> $photo

			);

			$this->siswa_model->insert_data($data,'siswa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Siswa Berhasil di Tambahkan!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/siswa');
		}
	}

	public function update($id)
	{
		$where = array ('id_siswa' => $id);

		$data['siswa'] = $this->db->query("SELECT * FROM siswa sw,kelas kls WHERE sw.nama_kelas=kls.nama_kelas AND sw.id_siswa='$id'")->result();
		$data['kelas'] = $this->matapelajaran_model->tampil_data('kelas')->result();
		$data['detail'] = $this->siswa_model->ambil_id_siswa($id);

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa_update',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_siswa_aksi()
	{
		$this->_rules();

		if($this->form_validation->run()== FALSE)
		{
			$this->update();
		}else{
			$id_siswa 				= $this->input->post('id_siswa');
			$NIS 					= $this->input->post('NIS');			
			$nama_lengkap 			= $this->input->post('nama_lengkap');
			$alamat					= $this->input->post('alamat');
			$email 					= $this->input->post('email');
			$telepon 				= $this->input->post('telepon');
			$tempat_lahir 			= $this->input->post('tempat_lahir');
			$tanggal_lahir 			= $this->input->post('tanggal_lahir');
			$jenis_kelamin 			= $this->input->post('jenis_kelamin');
			$nama_kelas 			= $this->input->post('nama_kelas');
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
				'NIS'			=> $NIS,
				'nama_lengkap'	=> $nama_lengkap,
				'alamat'		=> $alamat,
				'email' 		=> $email,
				'telepon'		=> $telepon,
				'tempat_lahir'	=> $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'jenis_kelamin' => $jenis_kelamin,
				'nama_kelas' 	=> $nama_kelas			

			);

			$where = array(
				'id_siswa' => $id
			);

			$this->siswa_model->update_data($where,$data,'siswa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Siswa Berhasil di Update!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/siswa');
		}
	}

	public function delete($id)
	{
		$where = array('id_siswa' => $id);
		$this->siswa_model->hapus_data($where,'siswa');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Siswa Berhasil di Hapus!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
		redirect('administrator/siswa');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('NIS','NIS', 'required',[
			'required'	=> 'NIS Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap', 'required',[
			'required'	=> 'Nama Lengkap Wajib di Isi!'
		]);
		$this->form_validation->set_rules('alamat','Alamat', 'required',[
			'required'	=> 'Alamat Wajib di Isi!'
		]);
		$this->form_validation->set_rules('email','Email', 'required',[
			'required'	=> 'Email Wajib di Isi!'
		]);
		$this->form_validation->set_rules('telepon','Telepon', 'required',[
			'required'	=> 'No Telepon Wajib di Isi!'
		]);
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir', 'required',[
			'required'	=> 'Tempat Lahir Wajib di Isi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir', 'required',[
			'required'	=> 'Tanggal Lahir Wajib di Isi!'
		]);
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin', 'required',[
			'required'	=> 'Jenis Kelamin Wajib di Isi!'
		]);
		$this->form_validation->set_rules('nama_kelas','Nama Kelas', 'required',[
			'required'	=> 'Nama Kelas Wajib di Isi!'
		]);
	}
}