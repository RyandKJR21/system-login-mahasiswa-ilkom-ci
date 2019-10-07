<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        	<div class="row">
				<div class="col-lg-8">

				<?= form_open_multipart(''); ?>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama']; ?>">
							 <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Nim</label>
						<div class="col-sm-10">
							<input type="text" name="nim" class="form-control" id="nim" value="<?= $mahasiswa['nim']; ?>">
							 <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="text" name="email" class="form-control" id="email" value="<?= $mahasiswa['email']; ?>">
							 <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Jumlah UKT</label>
						<div class="col-sm-10">
							<input type="text" name="ukt" class="form-control" id="ukt" value="<?= $mahasiswa['ukt']; ?>">
							 <?= form_error('ukt', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-10">
							<textarea type="text" name="alamat" class="form-control" id="alamat"><?= $mahasiswa['alamat']; ?></textarea>
							 <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
					 	<label for="name" class="col-sm-2 col-form-label">Angkatan</label>
					 	<div class="col-sm-10">
			             <select name="angkatan" id="angkatan" class="form-control">
			             	<option value="">Pilih Angkatan</option>
			                <option value="20161">20161</option>
			                <option value="20171">20171</option>
			                <option value="20181">20181</option>
			                <option value="20191">20191</option>
			              </select>
			              <?= form_error('angkatan', '<small class="text-danger pl-3">', '</small>'); ?>
			          	</div>
			        </div>
			        <div class="form-group row">
			        	<label for="name" class="col-sm-2 col-form-label">Kelas</label>
			        	<div class="col-sm-10">
			            <select name="kelas" id="kelas" class="form-control">
			               <option value="">Pilih Kelas</option>
			               <?php foreach($jurusan as $j) : ?>
			                 <option value="<?= $j['nama_kelas']; ?>"><?= $j['nama_kelas']; ?></option>
			               <?php endforeach?>
			            </select>
			            <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
			        	</div>
			        </div>
					<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Image</label>
					<div class="col-sm-2">
						<img src="<?=base_url('assets/img/img_mahasiswa/') . $mahasiswa['image']; ?>" class="img-thumbnail" width="80px">
					</div>
		              <div class="custom-file col-sm-7">
		                <input type="file" class="custom-file-input" id="image" name="image">
		                <label class="custom-file-label" for="image">Choose File</label>
		              </div>
		            </div>
					<div class="form-group row justify-content-end">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Edit</button>
						</div>
					</div>
				<?= form_close(); ?>

				</div>
			</div>
			
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
