<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-clipboard-list"></i> Jadwal Belajar dan Mengajar Kelas
	</div>

	<center class="mb-4">
		<legend class="mt-3"><strong>JADWAL BELAJAR KELAS</strong></legend>
		<table>
			<tr>
				<td><strong>Tingkatan</strong></td>
				<td>&nbsp;: <?php echo $kode_tingkatan?></td>
			</tr>
			<tr>
				<td><strong>Nama Tingkatan</strong></td>
				<td>&nbsp;: <?php echo $nama_tingkatan?></td>
			</tr>
			<tr>
				<td><strong>Nama Kelas</strong></td>
				<td>&nbsp;: <?php echo $nama_kelas?></td>
			</tr>
			<tr>
				<td><strong>Nama Wali Kelas</strong></td>
				<td>&nbsp;: <?php echo $nama_wali?></td>
			</tr>
			<tr>
				<td><strong>Tahun Akademik (Semester-Status)</strong></td>
				<td>&nbsp;: <?php echo $tahun_akademik.'&nbsp;('.$semester.'-'.$status.')'?></td>
			</tr>
		</table>
	</center>

	<?php echo anchor('administrator/jadwal/tambah_jadwal/'.$kode_tingkatan.'/'.$nama_kelas.'/'.$id_thn_akad,'<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jadwal</button>')?>
	<?php echo anchor('administrator/jadwal/print','<button class="btn btn-sm btn-info mb-3"><i class="fas fa-print fa-sm"></i> Cetak Jadwal</button>')?>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO</th>
			<!-- <th>Tahun Akademik</th> -->
			<th>Kode Mata Pelajaran</th>
			<th>ID Kelas</th>
			<!-- <th>SKS</th> -->
			<th>NAMA GURU</th>
			<th>Hari</th>
			<th>JAM MULAI</th>
			<th>JAM SELESAI</th>
		
			<th colspan="2">AKSI</th>
		</tr>

		<?php
		$no=1;
		$jumlahSks=0;
		foreach ($jadwal_data as $jdw): ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				
				<td><?php echo $jdw->kode_matapelajaran ?></td>
				<td><?php echo $jdw->kode_kelas ?></td>
			<!-- 	<td>
					<?php echo $jdw->sks;
								$jumlahSks+=$jdw->sks?>
				</td> -->
				<td><?php echo $jdw->nama_guru ?></td>
				<td><?php echo $jdw->hari ?></td>
				
				<td><?php echo $jdw->jam_mulai ?></td>
				<td><?php echo $jdw->jam_selesai ?></td>
				

				<td width="20px"><?php echo anchor('administrator/jadwal/update/'.$jdw->id_jadwal,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/jadwal/delete/'.$jdw->id_jadwal,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
			
		<?php endforeach;?>
			<!-- <tr>
				<td colspan="3" align="right"><strong>Jumlah SKS</strong></td>
				<td colspan="3"><strong><?php echo $jumlahSks; ?></strong></td>
			</tr> -->
	</table>
	<?php echo anchor('administrator/jadwal/index','<div class="btn btn-primary mt-3"> Kembali </div>') ?>
</div>