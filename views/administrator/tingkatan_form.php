<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		  <i class="fas fa-archway"></i> Form Input Tingkatan
		</div>
	
	<form method="post" action="<?php echo base_url('administrator/tingkatan/input_aksi') ?>">
		<div class="form-group">
			<label>Kode Tingkatan</label>
			<input type="text" name="kode_tingkatan" placeholder="Masukkan Kode Tingkatan" class="form-control">
			<?php echo form_error('kode_tingkatan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Tingkatan</label>
			<input type="text" name="nama_tingkatan" placeholder="Masukkan Nama Tingkatan" class="form-control">
			<?php echo form_error('nama_tingkatan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
		<?php echo anchor('administrator/tingkatan','<div class="btn btn-danger ml-2"> Cancel </div>') ?>

	</form>

</div>