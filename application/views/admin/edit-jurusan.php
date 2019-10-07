<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        	<div class="row">
				<div class="col-lg-8">

				<?= form_open_multipart(''); ?>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Kode Kelas</label>
						<div class="col-sm-10">
							<input type="text" name="kode_kelas" class="form-control" id="kode_kelas" value="<?= $penjurusan['kode_kelas']; ?>">
							 <?= form_error('kode_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Nama Kelas</label>
						<div class="col-sm-10">
							<input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="<?= $penjurusan['nama_kelas']; ?>">
							 <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
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
