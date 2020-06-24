<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-archway"></i> Form Update Kelas
		</div>

	<?php foreach($kelas as $kls) : ?>

		<form method="post" action="<?php echo base_url('administrator/kelas/update_aksi') ?>">
		<div class="form-group">
			<label>Kode Kelas</label>
			<input type="hidden" name="id_kelas" value="<?php echo $kls->id_kelas ?>">
			<input type="text" name="kode_kelas" class="form-control" value="<?php echo $kls->kode_kelas ?>">
		</div>

		<div class="form-group">
			<label>Nama Kelas</label>
			<input type="text" name="nama_kelas" class="form-control" value="<?php echo $kls->nama_kelas ?>">
		</div>

		<div class="form-group">
			<label>Nama Tingkatan</label>
			<select name="nama_tingkatan" class="form-control">
				<option value="<?php echo $kls->nama_tingkatan ?>">
				<?php echo $kls->nama_tingkatan; ?></option>
			
				<?php foreach ($tingkatan as $tkt) :?>
					<option value="<?php echo $tkt->nama_tingkatan ?>">
				<?php echo $tkt->nama_tingkatan; ?></option>
			<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Nama Wali Kelas</label>
			<input type="text" name="nama_wali" class="form-control" value="<?php echo $kls->nama_wali ?>">
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
		<?php echo anchor('administrator/kelas','<div class="btn btn-danger ml-2"> Cancel </div>') ?>
		</form>
	<?php endforeach; ?>
</div>