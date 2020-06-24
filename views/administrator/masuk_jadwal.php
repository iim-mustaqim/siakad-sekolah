<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		  <i class="fas fa-clipboard-list"></i> Form Masuk Halaman Jadwal
		</div>

		<?php echo $this->session->flashdata('pesan')?>

		<form method="post" action="<?php echo base_url('administrator/jadwal/jadwal_aksi')?>">
			
			<div class="form-group">
				<label>Kode Tingkatan</label>
				<input class="form-control" type="text" name="kode_tingkatan" placeholder="Masukkan Kode Tingkatan">
				<?php echo form_error('kode_tingkatan','<div class="text-danger small ml-2">','</div>')?>
			</div>

			<div class="form-group">
				<label>Nama Kelas</label>
				<input class="form-control" type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas">
				<?php echo form_error('nama_kelas','<div class="text-danger small ml-2">','</div>')?>
			</div>
			
			<div class="form-group">
				<label>Tahun Akademik / Status / Semester</label>
				<?php
					$query = $this->db->query('SELECT id_thn_akad, semester, status, CONCAT(tahun_akademik, "/ ", status, " /") AS thn_semester FROM tahun_akademik');
					$dropdowns = $query->result();

					foreach ($dropdowns as $dropdown) {
						if ($dropdown->semester == 'Ganjil') {
							$tampilSemester = "Ganjil";
						}else{
							$tampilSemester = "Genap";
						}

						$dropDownList[$dropdown->id_thn_akad] = $dropdown->thn_semester ." ". $tampilSemester;
					}

					echo form_dropdown('id_thn_akad',$dropDownList,'','class="form-control" id="id_thn_akad"');
				?>
			</div>
				<button type="submit" class="btn btn-primary">Proses</button>
		</form>

</div>