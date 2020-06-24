<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-user-tie"></i> GURU
		</div>

		<?php echo $this->session->flashdata('pesan')?>
		<?php echo anchor('administrator/guru/tambah_guru','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data Guru </button>')?>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>NO</th>
			<th>NIGN</th>
			<th>NAMA GURU</th>
			<th>ALAMAT</th>
			<th colspan="3">AKSI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($guru as $gr) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $gr->nign ?></td>
				<td><?php echo $gr->nama_guru ?></td>
				<td><?php echo $gr->alamat ?></td>
				<td width="20px"><?php echo anchor('administrator/guru/detail/'.$gr->nign,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/guru/update/'.$gr->nign,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/guru/delete/'.$gr->nign,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>