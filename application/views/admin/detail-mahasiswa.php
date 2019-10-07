<div class="container-fluid">

          <!-- Page Heading -->
          <div class="container">
          	<div class="row mt-3">
          		<div class="col-md-6">
          			
          			<div class="card">
          				<div class="card-header">
          					Detail Mahasiswa	
          				</div>	
          				<div class="card-body">
                                   <table class="table">
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Nama</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                                                  <?= $mahasiswa['nama']; ?>
                                             </h5>
                                        </td>
                                   </tr>
          							<tr>
                                        <td>
                                             <h5 class="card-text">Nim</h5>
                                        </td>
                                        <td>
                                             <h5 class="card-text">
                                             <?= $mahasiswa['nim']; ?></h5>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Email</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                    						<?= $mahasiswa['email']; ?>
                    					</h5>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Alamat</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                    						<?= $mahasiswa['alamat']; ?>
                    					</h5>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Jumlah UKT</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                    						<?= $mahasiswa['ukt']; ?>
                    					</h5>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Angkatan</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                    						<?= $mahasiswa['angkatan']; ?>
                    					</h5>
                                        </td>
                                   </tr>
                                   <tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Kelas</h5>
                                        </td>
                                        <td>
                                             <h5 class="card-text">
                                                  <?= $mahasiswa['kelas']; ?>
                                             </h5>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Foto</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                    						<img src="<?=base_url('assets/img/img_mahasiswa/') . $mahasiswa['image']; ?>" class="img-thumbnail" width="120px">
                    					</h5>
                                        </td>
                                   </tr>
                                   </table>
          					<a href="<?= base_url('admin/mahasiswa'); ?>" class="btn btn-primary">Kembali
          					</a>
          				</div>
          			</div>
          		</div>
          	</div>
          </div>

</div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->