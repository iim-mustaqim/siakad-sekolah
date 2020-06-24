<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		  <i class="fas fa-edit"></i></i> FORM UPDATE TAHUN AKADEMIK
		</div>

		<?php foreach($tahun_akademik as $ta) : ?>
	
	<form method="post" action="<?php echo base_url('administrator/tahun_akademik/update_aksi') ?>">
		<div class="form-group">
			<label>Tahun Akademik</label>
			<input type="hidden" name="id_thn_akad" value="<?php echo $ta->id_thn_akad ?>">
			<input type="text" name="tahun_akademik" class="form-control" value="<?php echo $ta->tahun_akademik ?>">
			<?php echo form_error('tahun_akademik', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Semester</label>
			<select name="semester" class="form-control">
				<option ><?php echo $ta->semester ?></option>
				<option>Ganjil</option>
				<option>Genap</option>
			</select>
			<?php echo form_error('semester', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control">
				<option ><?php echo $ta->status ?></option>
				<option>Aktif</option>
				<option>Tidak Aktif</option>
			</select>
			<?php echo form_error('status', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
		<?php echo anchor('administrator/tahun_akademik','<div class="btn btn-danger ml-2"> Cancel </div>') ?>
	</form>
<?php endforeach; ?>
</div>