<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fa fa-plus"></i> Form Tambah Jadwal
	</div>

	<form method="post" action="<?php echo base_url('administrator/jadwal/tambah_jadwal_aksi')?>">
		<div class="form-group">
			<label>Kode Tingkatan</label>
			<input type="hidden" name="id_thn_akad" class="form-control" value="<?php echo $id_thn_akad; ?>">
			<input type="hidden" name="id_jadwal" class="form-control" value="<?php echo $id_jadwal; ?>">
			<input type="text" name="kode_tingkatan" class="form-control" value="<?php echo $kode_tingkatan; ?>" readonly/>
		</div>		
		<div class="form-group">
			<label>Nama Kelas</label>
			<input type="text" name="nama_kelas" class="form-control" value="<?php echo $nama_kelas; ?>" readonly/>
		</div>
		<div class="form-group">
			<label>Tahun Akademik / Semester / Status</label>			
			<input type="text" name="tahun_akademik" class="form-control" value="<?php echo $tahun_akademik.'/'.$semester.'/'.$status; ?>" readonly/>
		</div>
		<div class="form-group">
			<label>Nama Wali Kelas</label>
			<input type="text" name="nama_wali" class="form-control" value="<?php echo $nama_wali; ?>" readonly/>
		</div>
		<div class="form-group">
			<label>Hari</label>
			<input type="text" name="hari" placeholder="Masukkan Nama Hari" class="form-control">
			<?php echo form_error('hari', '<div class="text-danger small" ml-3>') ?>
		</div>
		<div>
			<label>Mata Pelajaran</label>
			<?php
				$query = $this->db->query('SELECT kode_matapelajaran,nama_matapelajaran FROM matapelajaran');

				$dropdowns = $query->result();
				foreach($dropdowns as $dropdown){
					$dropDownList[$dropdown->kode_matapelajaran] = $dropdown->nama_matapelajaran;
				}

				echo form_dropdown('kode_matapelajaran', $dropDownList,$kode_matapelajaran, 'class="form-control" id="kode_matapelajaran"');
			?>
		</div>
		<div class="form-group">
			<label>Jam Mulai</label>
			<input type="text" name="jam_mulai" placeholder="Masukkan Jam Mulai" class="form-control">
			<?php echo form_error('jam_mulai', '<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Jam Selesai</label>
			<input type="text" name="jam_selesai" placeholder="Masukkan Jam Selesai" class="form-control">
			<?php echo form_error('jam_selesai', '<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Nama Guru</label>
			<input type="text" name="nama_guru" placeholder="Masukkan Nama Guru" class="form-control">
			<?php echo form_error('nama_guru', '<div class="text-danger small" ml-3>') ?>
		</div>

		
		<button type="submit" class="btn btn-primary mt-3">Simpan</button>
		<?php echo anchor('administrator/jadwal/index','<div class="btn btn-danger ml-2 mt-3"> Cancel </div>') ?>
	</form>
</div>