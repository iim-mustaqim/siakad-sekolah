<div class="container-fluid">

		<div class="card shadow mb-4">
	        <div class="alert alert-success" role="alert">
			  <i class="fas fa-archway"></i> Tingkatan
			</div>
			<?php echo $this->session->flashdata('pesan')?>			            

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                	<?php echo anchor('administrator/tingkatan/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Tingkatan</button>')?>
                  <thead>
                    <tr>
					<th>NO</th>
					<th>KODE TINGKATAN</th>
					<th>NAMA TINGKATAN</th>
					<th colspan="2">AKSI</th>
					</tr>
                  </thead>
                  <tfoot>
                    <tr>
					<th>NO</th>
					<th>KODE TINGKATAN</th>
					<th>NAMA TINGKATAN</th>
					<th colspan="2">AKSI</th>
					</tr>
                  </tfoot>
                  <tbody>
                    <?php
					$no = 1;
					foreach ($tingkatan as $tkt) :	?>
					<tr>
						<td width="20px"><?php echo $no++ ?></td>
						<td><?php echo $tkt->kode_tingkatan ?></td>
						<td><?php echo $tkt->nama_tingkatan ?></td>
						<td width="20px"><?php echo anchor('administrator/tingkatan/update/'.$tkt->id_tingkatan,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
						<td width="20px"><?php echo anchor('administrator/tingkatan/delete/'.$tkt->id_tingkatan,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
					</tr>
					<?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

</div>