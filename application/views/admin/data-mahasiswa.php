<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
             <?= form_open('admin/searchMahasiswa'); ?>
           <input type="text" name="keyword" id="keyword" class="" placeholder="Search for...">
              <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
              </button>
              <?= form_close(); ?> 
          </div>



           <div class="row">
          <div class="col-lg-8">
          	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMahasiswaMenuModal">Add New Mahasiswa</a>
          	<?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('nim', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('ukt', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('alamat', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('angkatan', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= form_error('kelas', '<div class="alert alert-danger" role="alert">', '</div>') ?>

          	<?= $this->session->flashdata('massage'); ?>
            
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nim</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=1; ?>
              	<?php foreach ($nama as $n) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $n['nama']; ?></td>
                  <td><?= $n['nim']; ?></td>
                  <td>
                    <a class="badge badge-primary" href="<?= base_url('admin/detailmahasiswa/'); ?><?= $n['id'];?>">detail</a>
                    <a class="badge badge-success" href="<?= base_url('admin/editmahasiswa/'); ?><?= $n['id'];?>">Edit</a>
               			<a class="badge badge-danger" href="<?= base_url('admin/hapusmahasiswa/'); ?><?= $n['id']; ?>" onclick="return confirm('Apakah anda yakin?');">Hapus</a></td>
                </tr>
                <?php $i++; ?>
            	 <?php endforeach; ?>
            </tbody>
        	</table>
          </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="newMahasiswaMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMahasiswaMenuModalLabel" aria-hidden="true">
        	<div class="modal-dialog" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
            		<h5 class="modal-title" id="newMahasiswaMenuModalLabel">Add New Mahasiswa</h5>
            		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
            		</button>
        			</div>

        	<?= form_open_multipart('admin/mahasiswa'); ?>
        	<div class="modal-body">
        		<div class="form-group">
        			<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Mahasiswa">
        		</div>
            <div class="form-group">
              <input type="text" name="nim" class="form-control" id="nim" placeholder="Nim Mahasiswa">
            </div>
        		<div class="form-group">
        			<input type="text" name="email" class="form-control" id="email" placeholder="Email Mahasiswa">
        		</div>
            <div class="form-group">
              <input type="text" name="ukt" class="form-control" id="ukt" placeholder="Jumlah UKT">
            </div>
            <div class="form-group">
              <textarea type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Mahasiswa"></textarea>
            </div>
            <div class="form-group">
              <select name="angkatan" id="angkatan" class="form-control"><option>Pilih Angkatan</option>
                <option value="20161">20161</option>
                <option value="20171">20171</option>
                <option value="20181">20181</option>
                <option value="20191">20191</option>
              </select>
            </div>
            <div class="form-group">
             <select name="kelas" id="kelas" class="form-control">
                <option value="">Pilih Kelas</option>
                <?php foreach($jurusan as $j) : ?>
                  <option value="<?= $j['nama_kelas']; ?>"><?= $j['nama_kelas']; ?></option>
                <?php endforeach?>
              </select>
            </div>
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
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



      



       	
     