<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-eye"></i> DETAIL MATA PELAJARAN
		</div>

		<table class="table table-hover table-striped table-bordered">
			
			<?php foreach ($detail as $dt) : ?>
			<tr>
				<th>Kode Mata Pelajaran</th>
				<td><?php echo $dt->kode_matapelajaran; ?></td>
			</tr>

			<tr>
				<th>Nama Mata Pelajaran</th>
				<td><?php echo $dt->nama_matapelajaran; ?></td>
			</tr>

			<tr>
				<th>SKS</th>
				<td><?php echo $dt->sks; ?></td>
			</tr>

			<tr>
				<th>Nama Guru</th>
				<td><?php echo $dt->nama_guru; ?></td>
			</tr>

			<tr>
				<th>Semester</th>
				<td><?php echo $dt->semester; ?></td>
			</tr>

			<tr>
				<th>Kelas</th>
				<td><?php echo $dt->nama_kelas; ?></td>
			</tr>

 
		<?php endforeach; ?>
		</table>
		<?php echo anchor('administrator/matapelajaran','<div class="btn btn-sm btn-primary">Kembali</div>') ?>
</div>