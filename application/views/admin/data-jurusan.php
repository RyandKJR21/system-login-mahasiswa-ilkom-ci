<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

           <div class="row">
          <div class="col-lg-8">
          	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newJurusanMenuModal">Add New Jurusan</a>
          	<?= form_error('kode_kelas', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('nama_kelas', '<div class="alert alert-danger" role="alert">', '</div>') ?>

          	<?= $this->session->flashdata('massage'); ?>
            
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Kode Kelas</th>
                  <th scope="col">Nama Kelas</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=1; ?>
              	<?php foreach ($jurusan as $j) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $j['kode_kelas']; ?></td>
                  <td><?= $j['nama_kelas']; ?></td>
                  <td>
                    <a class="badge badge-warning" href="<?= base_url('admin/lihatmahasiswa/'); ?><?= $j['nama_kelas'];?>">Lihat Mahasiswa</a>
                    <a class="badge badge-success" href="<?= base_url('admin/editjurusan/'); ?><?= $j['id'];?>">Edit</a>
               			<a class="badge badge-danger" href="<?= base_url('admin/hapusjurusan/'); ?><?= $j['id']; ?>" onclick="return confirm('Apakah anda yakin?');">Hapus</a></td>
                </tr>
                <?php $i++; ?>
            	 <?php endforeach; ?>
            </tbody>
        	</table>
          </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="newJurusanMenuModal" tabindex="-1" role="dialog" aria-labelledby="newJurusanMenuModalLabel" aria-hidden="true">
        	<div class="modal-dialog" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
            		<h5 class="modal-title" id="newJurusanMenuModalLabel">Add New Jurusan</h5>
            		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
            		</button>
        			</div>

        	<?= form_open_multipart('admin/penjurusan'); ?>
        	<div class="modal-body">
        		<div class="form-group">
        			<input type="text" name="kode_kelas" class="form-control" id="kode_kelas" placeholder="Kode Kelas">
        		</div>
            <div class="form-group">
              <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Nama Kelas">
            </div>
        	<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="submit" class="btn btn-primary">Add</button>
        	</div>

          <?= form_close(); ?>
        		</div>       	
        </div>
      </div>
    </div>


        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->



      



       	
     