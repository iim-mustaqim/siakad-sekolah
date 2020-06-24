<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-eye"></i> DETAIL GURU
		</div>

		<table class="table table-hover table-striped table-bordered">
			<?php foreach ($detail as $dt) : ?>

			<img class="mb-4" src="<?php echo base_url('assets/uploads/').$dt->photo?>" style="width: 10%">

			<tr>
				<th>NIGN</th>
				<td><?php echo $dt->nign; ?></td>
			</tr>

			<tr>
				<th>Nama Guru</th>
				<td><?php echo $dt->nama_guru; ?></td>
			</tr>

			<tr>
				<th>Alamat</th>
				<td><?php echo $dt->alamat; ?></td>
			</tr>

			<tr>
				<th>Jenis Kelamin</th>
				<td><?php echo $dt->jenis_kelamin; ?></td>
			</tr>

			<tr>
				<th>Tempat Lahir</th>
				<td><?php echo $dt->tempat_lahir; ?></td>
			</tr>

			<tr>
				<th>Tanggal Lahir</th>
				<td><?php echo $dt->tanggal_lahir; ?></td>
			</tr>

			<tr>
				<th>Matapelajaran</th>
				<td><?php echo $dt->nama_matapelajaran; ?></td>
			</tr>

			<tr>
				<th>Email</th>
				<td><?php echo $dt->email; ?></td>
			</tr>

			<tr>
				<th>No Telepon</th>
				<td><?php echo $dt->telp; ?></td>
			</tr>
			
				<?php endforeach; ?>
		</table>
		<?php echo anchor('administrator/guru','<div class="btn btn-sm btn-primary">Kembali</div>') ?><br>
		<br><br><br>
</div>