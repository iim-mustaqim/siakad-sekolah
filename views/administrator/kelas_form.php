<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		  <i class="fas fa-archway"></i> Form Input Kelas
		</div>
	
	<form method="post" action="<?php echo base_url('administrator/kelas/tambah_kelas_aksi') ?>">
		<div class="form-group">
			<label>Kode Kelas</label>
			<input type="text" name="kode_kelas" placeholder="Masukkan Kode kelas" class="form-control">
			<?php echo form_error('kode_kelas', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Kelas</label>
			<input type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas" class="form-control">
			<?php echo form_error('nama_kelas', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Tingkatan</label>
			<select name="nama_tingkatan" class="form-control">
				<option value="">--Pilih Tingkatan--</option>
				<?php foreach($tingkatan as $tkt) : ?>
				<option value="<?php echo $tkt->nama_tingkatan ?>"><?php echo $tkt->nama_tingkatan; ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('nama_tingkatan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Wali Kelas</label>
			<input type="text" name="nama_wali" placeholder="Masukkan Nama Wali Kelas" class="form-control">
			<?php echo form_error('nama_wali', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
		<?php echo anchor('administrator/kelas','<div class="btn btn-danger ml-2"> Cancel </div>') ?>

	</form>

</div>