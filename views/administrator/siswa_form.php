<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-user-graduate"></i> TAMBAH DATA SISWA
	</div>

	<?php echo form_open_multipart('administrator/siswa/tambah_siswa_aksi') ?>
		<div class="form-group">
			<label>NIS Siswa</label>
			<input type="text" name="NIS" class="form-control">
			<?php echo form_error('NIS','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Nama Siswa</label>
			<input type="text" name="nama_lengkap" class="form-control">
			<?php echo form_error('nama_lengkap','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control">
			<?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control">
			<?php echo form_error('email','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>No Telepon</label>
			<input type="text" name="telepon" class="form-control">
			<?php echo form_error('telepon','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="tempat_lahir" class="form-control">
			<?php echo form_error('tempat_lahir','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" class="form-control">
			<?php echo form_error('tanggal_lahir','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select name="jenis_kelamin" class="form-control">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<option>Laki-laki</option>
				<option>Perempuan</option>
			</select>
			<?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Kelas</label>
			<select name="nama_kelas" class="form-control">
				<option value="" >-- Pilih Kelas --</option>
				<?php foreach ($kelas as $kls) : ?>
					<option value="<?php echo $kls->nama_kelas ?>"><?php echo $kls->nama_kelas ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('nama_kelas','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Photo</label><br>
			<input type="file" name="photo">
		</div>

		<button type="submit" class="btn btn-primary mt-3">Simpan</button>
		<?php echo anchor('administrator/siswa','<div class="btn btn-danger ml-2 mt-3"> Batal </div>') ?>

	<?php form_close(); ?>
</div>