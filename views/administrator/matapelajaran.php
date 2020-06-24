<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-book"></i> MATA PELAJARAN
		</div>

		<?php echo $this->session->flashdata('pesan')?>
		<?php echo anchor('administrator/matapelajaran/tambah_matapelajaran','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mata Pelajaran</button>')?>
		
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>NO</th>
			<th>KODE MATA PELAJARAN</th>
			<th>NAMA MATA PELAJARAN</th>
			<th>NAMA GURU</th>
			<th>KELAS</th>
			<th colspan="3">AKSI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($matapelajaran as $mp) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $mp->kode_matapelajaran ?></td>
				<td><?php echo $mp->nama_matapelajaran ?></td>
				<td><?php echo $mp->nama_guru ?></td>
				<td><?php echo $mp->nama_kelas ?></td>
				<td width="20px"><?php echo anchor('administrator/matapelajaran/detail/'.$mp->kode_matapelajaran,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/matapelajaran/update/'.$mp->kode_matapelajaran,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/matapelajaran/delete/'.$mp->kode_matapelajaran,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
		
	</table>
</div>