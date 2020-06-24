<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		  <i class="fas fa-book"></i> Form Input Mata Pelajaran
		</div>

	<form method="post" action="<?php echo base_url('administrator/matapelajaran/tambah_matapelajaran_aksi')?>">
		<div class="form-group">
			<label>Kode Mata Pelajaran</label>
			<input type="text" name="kode_matapelajaran" class="form-control">
			<?php echo form_error('kode_matapelajaran','<div class="text-danger small ml-3">') ?>
		</div>

		<div class="form-group">
			<label>Nama Mata Pelajaran</label>
			<input type="text" name="nama_matapelajaran" class="form-control">
			<?php echo form_error('nama_matapelajaran','<div class="text-danger small ml-3">') ?>
		</div>

		<div class="form-group">
			<label>SKS</label>
			<select name="sks" class="form-control">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
			</select>
			<?php echo form_error('sks','<div class="text-danger small ml-3">') ?>
		</div>

		<div class="form-group">
			<label>Nama Guru</label>
			<input type="text" name="nama_guru" class="form-control">
			<?php echo form_error('nama_guru','<div class="text-danger small ml-3">') ?>
		</div>

		<div class="form-group">
			<label>Semester</label>
			<select name="semester" class="form-control">
				<option>1</option>
				<option>2</option>
			</select>
			<?php echo form_error('semester','<div class="text-danger small ml-3">') ?>
		</div>

		<div class="form-group">
			<label>Kelas</label>
			<select name="nama_kelas" class="form-control">
				<option value="" >--Pilih Kelas--</option>
				<?php foreach ($kelas as $kls) : ?>
					<option value="<?php echo $kls->nama_kelas ?>"><?php echo $kls->nama_kelas ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('nama_kelas','<div class="text-danger small ml-3">') ?>
		</div>

		<button type="submit" class="btn btn-primary ">Simpan</button>
		<?php echo anchor('administrator/matapelajaran','<div class="btn btn-danger ml-2"> Cancel </div>') ?>		
	</form>
</div>