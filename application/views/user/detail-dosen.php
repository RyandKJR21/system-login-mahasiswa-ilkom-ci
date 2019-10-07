<div class="container-fluid">

          <!-- Page Heading -->
          <div class="container">
          	<div class="row mt-3">
          		<div class="col-md-6">
          			
          			<div class="card">
          				<div class="card-header">
          					Detail Dosen	
          				</div>	
          				<div class="card-body">
                                   <table class="table">
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Nama</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                                                  <?= $dosen['nama']; ?>
                                             </h5>
                                        </td>
                                   </tr>
          							<tr>
                                        <td>
                                             <h5 class="card-text">Nip</h5>
                                        </td>
                                        <td>
                                             <h5 class="card-text">
                                             <?= $dosen['nip']; ?></h5>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Jabatan</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                    						<?= $dosen['jabatan']; ?>
                    					</h5>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Gelar</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                    						<?= $dosen['gelar']; ?>
                    					</h5>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Email</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                    						<?= $dosen['email']; ?>
                    					</h5>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <h5 class="card-text">Foto</h5>
                                        </td>
                                        <td>
                    					<h5 class="card-text">
                    						<img src="<?=base_url('assets/img/img_dosen/') . $dosen['image']; ?>" class="img-thumbnail" width="120px">
                    					</h5>
                                        </td>
                                   </tr>
                                   </table>
          					<a href="<?= base_url('user/dosen'); ?>" class="btn btn-primary">Kembali
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