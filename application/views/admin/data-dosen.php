<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
             <?= form_open('admin/searchDosen'); ?>
           <input type="text" name="keyword" id="keyword" class="" placeholder="Search for...">
              <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
              </button>
              <?= form_close(); ?> 
        </div>

           <div class="row">
          <div class="col-lg-8">
          	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDosenMenuModal">Add New Dosen</a>
          	<?= form_error('nama_dosen', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('nip_dosen', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('jabatan', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('gelar', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('email_dosen', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('angkatan', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            
          	<?= $this->session->flashdata('massage'); ?>
            
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nip</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=1; ?>
              	<?php foreach ($nama as $n) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $n['nama']; ?></td>
                  <td><?= $n['nip']; ?></td>
                  <td>
                    <a class="badge badge-primary" href="<?= base_url('admin/detaildosen/'); ?><?= $n['id'];?>">Detail</a>
                    <a class="badge badge-success" href="<?= base_url('admin/editdosen/'); ?><?= $n['id'];?>">Edit</a>
               			<a class="badge badge-danger" href="<?= base_url('admin/hapusdosen/'); ?><?= $n['id']; ?>" onclick="return confirm('Apakah anda yakin?');">Hapus</a></td>
                </tr>
                <?php $i++; ?>
            	 <?php endforeach; ?>
            </tbody>
        	</table>
          </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="newDosenMenuModal" tabindex="-1" role="dialog" aria-labelledby="newDosenMenuModalLabel" aria-hidden="true">
        	<div class="modal-dialog" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
            		<h5 class="modal-title" id="newDosenMenuModalLabel">Add New Dosen</h5>
            		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
            		</button>
        			</div>

        	<?= form_open_multipart('admin/dosen'); ?>
        	<div class="modal-body">
        		<div class="form-group">
        			<input type="text" name="nama_dosen" class="form-control" id="nama_dosen" placeholder="Nama dosen">
        		</div>
            <div class="form-group">
              <input type="text" name="nip_dosen" class="form-control" id="nip_dosen" placeholder="Nip dosen">
            </div>
        		<div class="form-group">
        			<input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan Akademik">
        		</div>
            <div class="form-group">
              <input type="text" name="gelar" class="form-control" id="gelar" placeholder="Gelar Akademik">
            </div>
            <div class="form-group">
              <input type="text" name="email_dosen" class="form-control" id="email_dosen" placeholder="Email dosen">
            </div>
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image_dosen" name="image_dosen">
                <label class="custom-file-label" for="image">Choose File</label>
              </div>
            </div>
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
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->



      



       	
     