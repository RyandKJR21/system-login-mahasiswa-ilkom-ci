<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        	<div class="row">
				<div class="col-lg-8">

				<?= form_open_multipart(''); ?>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Nama Dosen</label>
						<div class="col-sm-10">
							<input type="text" name="nama_dosen" class="form-control" id="nama_dosen" value="<?= $dosen['nama']; ?>">
							 <?= form_error('nama_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Nip Dosen</label>
						<div class="col-sm-10">
							<input type="text" name="nip_dosen" class="form-control" id="nip_dosen" value="<?= $dosen['nip']; ?>">
							 <?= form_error('nip_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-10">
							<input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $dosen['jabatan']; ?>">
							 <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Gelar</label>
						<div class="col-sm-10">
							<input type="text" name="gelar" class="form-control" id="gelar" value="<?= $dosen['gelar']; ?>">
							 <?= form_error('gelar', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="text" name="email_dosen" class="form-control" id="email_dosen" value="<?= $dosen['email']; ?>">
							 <?= form_error('email_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Image</label>
					<div class="col-sm-2">
						<img src="<?=base_url('assets/img/img_dosen/') . $dosen['image']; ?>" class="img-thumbnail" width="80px">
					</div>
		              <div class="custom-file col-sm-7">
		                <input type="file" class="custom-file-input" id="image_dosen" name="image_dosen">
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
