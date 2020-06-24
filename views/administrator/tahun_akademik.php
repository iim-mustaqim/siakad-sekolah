<div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="alert alert-success" role="alert">
			<i class="fas fa-calendar-alt"></i></i> TAHUN AKADEMIK
			</div>
			<?php echo $this->session->flashdata('pesan')?>
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
				<?php echo anchor('administrator/tahun_akademik/tambah_tahun_akademik','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Tahun Akademik</button>')?>
                  <thead>
                    <tr>
					<th>NO</th>
					<th>TAHUN AKADEMIK</th>
					<th>SEMESTER</th>
					<th>STATUS</th>
					<th colspan="2">AKSI</th>
					</tr>
                  </thead>
                  <tfoot>
                    <tr>
					<th>NO</th>
					<th>TAHUN AKADEMIK</th>
					<th>SEMESTER</th>
					<th>STATUS</th>
					<th colspan="2">AKSI</th>
					</tr>
                  </tfoot>
                  <tbody>
                    <?php
					$no=1;
					foreach ($tahun_akademik as $ak): ?>
						<tr>
							<td width="20px"><?php echo $no++ ?></td>
							<td><?php echo $ak->tahun_akademik ?></td>
							<td><?php echo $ak->semester ?></td>
							<td><?php echo $ak->status ?></td>
							<td width="20px"><?php echo anchor('administrator/tahun_akademik/update/'.$ak->id_thn_akad,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
							<td width="20px"><?php echo anchor('administrator/tahun_akademik/delete/'.$ak->id_thn_akad,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
						</tr>
					<?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>