<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		  <i class="fas fa-edit"></i> Form Edit Mata Pelajaran
		</div>

		<?php foreach($matapelajaran as $mp) : ?>
			<form method="post" action="<?php echo base_url('administrator/matapelajaran/update_aksi')?>">
				<div class="form-group">
					<label>Nama Mata Pelajaran</label>
					<input type="hidden" name="kode_matapelajaran" class="form-control" value="<?php echo $mp->kode_matapelajaran ?>">
					<input type="text" name="nama_matapelajaran" class="form-control" value="<?php echo $mp->nama_matapelajaran ?>">
				</div>

				<div class="form-group">
					<label>SKS</label>
					<select name="sks" class="form-control">
						<option><?php echo $mp->sks ?></option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>						
					</select>
				</div>

				<div class="form-group">
					<label>Nama Guru</label>
					<input type="text" name="nama_guru" class="form-control" value="<?php echo $mp->nama_guru ?>">
				</div>

				<div class="form-group">
					<label>Semester</label>
					<select name="semester" class="form-control">
						<option><?php echo $mp->semester ?></option>
						<option>1</option>
						<option>2</option>												
					</select>
				</div>

				<div class="form-group">
					<label>Kelas</label>
					<select name="nama_kelas" class="form-control">
						<option><?php echo $mp->nama_kelas ?></option>
						<?php foreach($kelas as $kls) : ?>
							<option value="<?php echo $kls->nama_kelas; ?>"><?php echo $kls->nama_kelas; ?></option>
						<?php endforeach; ?>				
					</select>
				</div>

				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
				<?php echo anchor('administrator/matapelajaran','<div class="btn btn-danger ml-2"> Cancel </div>') ?>
			</form>
		<?php endforeach;?>
</div>