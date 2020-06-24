<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-user-graduate"></i> FORM UPDATE DATA SISWA
	</div>

	<?php foreach($siswa as $sw) : ?>
	<?php echo form_open_multipart('administrator/siswa/update_siswa_aksi') ?>

		<div class="form-group">
			<label>NIS Siswa</label>
			<input type="hidden" name="id_siswa" class="form-control" value="<?php echo $sw->id_siswa ?>">
			<input type="text" name="NIS" class="form-control" value="<?php echo $sw->NIS ?>">
			<?php echo form_error('NIS','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Nama Siswa</label>
			<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $sw->nama_lengkap ?>">
			<?php echo form_error('nama_lengkap','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?php echo $sw->alamat ?>">
			<?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" value="<?php echo $sw->email ?>">
			<?php echo form_error('email','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>No Telepon</label>
			<input type="text" name="telepon" class="form-control" value="<?php echo $sw->telepon ?>">
			<?php echo form_error('telepon','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $sw->tempat_lahir ?>">
			<?php echo form_error('tempat_lahir','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $sw->tanggal_lahir ?>">
			<?php echo form_error('tanggal_lahir','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select name="jenis_kelamin" class="form-control" value="<?php echo $sw->jenis_kelamin ?>">
				<option>Laki-laki</option>
				<option>Perempuan</option>
			</select>
			<?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Kelas</label>
			<select name="nama_kelas" class="form-control" value="<?php echo $sw->nama_kelas ?>">
				<?php foreach ($kelas as $kls) : ?>
					<option value="<?php echo $kls->nama_kelas ?>"><?php echo $kls->nama_kelas ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('nama_kelas','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">

			<?php foreach($detail as $dt) : ?>
				<img src="<?php echo base_url().'assets/uploads/'.$sw->photo ?>" style="width: 10%">
				<?php endforeach; ?><br><br>
			<label>Photo</label><br>
			<input type="file" name="userfile" value="<?php echo $sw->photo ?>">
		</div>

		<button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>

	<?php form_close(); ?>
	<?php endforeach; ?>
</div>