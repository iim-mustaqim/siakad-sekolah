<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-user-graduate"></i> SISWA
		</div>

		<?php echo $this->session->flashdata('pesan')?>
		<?php echo anchor('administrator/siswa/tambah_siswa','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data Siswa </button>')?>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>NO</th>
			<th>NAMA LENGKAP</th>
			<th>ALAMAT</th>
			<th>EMAIL</th>
			<th colspan="3">AKSI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($siswa as $sw) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $sw->nama_lengkap ?></td>
				<td><?php echo $sw->alamat ?></td>
				<td><?php echo $sw->email ?></td>
				<td width="20px"><?php echo anchor('administrator/siswa/detail/'.$sw->id_siswa,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/siswa/update/'.$sw->id_siswa,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/siswa/delete/'.$sw->id_siswa,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>