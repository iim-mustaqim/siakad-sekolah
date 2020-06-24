<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-user-tie"></i> FORM UPDATE DATA GURU
	</div>

	<?php foreach($guru as $gr) : ?>
	<?php echo form_open_multipart('administrator/guru/update_guru_aksi') ?>

		<div class="form-group">
			<label>NIGN Guru</label>
			<input type="hidden" name="id_guru" class="form-control" value="<?php echo $gr->id_guru ?>">
			<input type="text" name="nign" class="form-control" value="<?php echo $gr->nign ?>">
			<?php echo form_error('nign','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Nama Guru</label>
			<input type="text" name="nama_guru" class="form-control" value="<?php echo $gr->nama_guru ?>">
			<?php echo form_error('nama_guru','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?php echo $gr->alamat ?>">
			<?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select name="jenis_kelamin" class="form-control" value="<?php echo $gr->jenis_kelamin ?>">
				<option>Laki-laki</option>
				<option>Perempuan</option>
			</select>
			<?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>') ?>
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
			<label>Nama Matapelajaran</label>
			<input type="text" name="nama_matapelajaran" class="form-control">
			<?php echo form_error('nama_matapelajaran','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" value="<?php echo $gr->email ?>">
			<?php echo form_error('email','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">
			<label>No Telepon</label>
			<input type="text" name="telp" class="form-control" value="<?php echo $gr->telp ?>">
			<?php echo form_error('telp','<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<div class="form-group">

			<?php foreach($detail as $dt) : ?>
				<img src="<?php echo base_url().'assets/uploads/'.$gr->photo ?>" style="width: 10%">
				<?php endforeach; ?><br><br>
			<label>Photo</label><br>
			<input type="file" name="userfile" value="<?php echo $gr->photo ?>">
		</div>

		<button type="submit" class="btn btn-primary mt-3">Simpan</button>
		<?php echo anchor('administrator/guru','<div class="btn btn-danger ml-2 mt-3"> Cancel </div>') ?>

	<?php form_close(); ?>
	<?php endforeach; ?>
</div>