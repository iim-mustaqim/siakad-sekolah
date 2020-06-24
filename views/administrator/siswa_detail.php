<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-eye"></i> DETAIL SISWA
		</div>

		<table class="table table-hover table-striped table-bordered">
			<?php foreach ($detail as $dt) : ?>

			<img class="mb-4" src="<?php echo base_url('assets/uploads/').$dt->photo?>" style="width: 10%">

			<tr>
				<th>NIS</th>
				<td><?php echo $dt->NIS; ?></td>
			</tr>

			<tr>
				<th>Nama Lengkap</th>
				<td><?php echo $dt->nama_lengkap; ?></td>
			</tr>

			<tr>
				<th>Alamat</th>
				<td><?php echo $dt->alamat; ?></td>
			</tr>

			<tr>
				<th>Email</th>
				<td><?php echo $dt->email; ?></td>
			</tr>

			<tr>
				<th>No Telepon</th>
				<td><?php echo $dt->telepon; ?></td>
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
				<th>Jenis Kelamin</th>
				<td><?php echo $dt->jenis_kelamin; ?></td>
			</tr>

			<tr>
				<th>Nama Kelas</th>
				<td><?php echo $dt->nama_kelas; ?></td>
			</tr>
			
				<?php endforeach; ?>
		</table>
		<?php echo anchor('administrator/siswa','<div class="btn btn-sm btn-primary">Kembali</div>') ?><br>
		<br><br><br>
</div>