<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-archway"></i> Form Update Tingkatan
		</div>

	<?php foreach($tingkatan as $tkt) : ?>

		<form method="post" action="<?php echo base_url('administrator/tingkatan/update_aksi') ?>">
		<div class="form-group">
			<label>Kode Tingkatan</label>
			<input type="hidden" name="id_tingkatan" value="<?php echo $tkt->id_tingkatan ?>">
			<input type="text" name="kode_tingkatan" class="form-control" value="<?php echo $tkt->kode_tingkatan ?>">
		</div>

		<div class="form-group">
			<label>Nama Tingkatan</label>
			<input type="text" name="nama_tingkatan" class="form-control" value="<?php echo $tkt->nama_tingkatan ?>">
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
		<?php echo anchor('administrator/tingkatan','<div class="btn btn-danger ml-2"> Cancel </div>') ?>
		</form>
	<?php endforeach; ?>
</div>