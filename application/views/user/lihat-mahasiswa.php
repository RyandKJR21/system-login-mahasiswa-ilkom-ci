<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

           <div class="row">
          <div class="col-lg-12">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nim</th>
                  <th scope="col">Email</th>
                  <th scope="col">UKT</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Angkatan</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Foto</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                <?php foreach ($lihat_kelas as $a) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                    <td><?= $a['nama']; ?></td>
                    <td><?= $a['nim']; ?></td>
                    <td><?= $a['email']; ?></td>
                    <td><?= $a['ukt']; ?></td>
                    <td><?= $a['alamat']; ?></td>
                    <td><?= $a['angkatan']; ?></td>
                    <td><?= $a['kelas']; ?></td>
                    <td><img src="<?=base_url('assets/img/img_mahasiswa/') . $a['image']; ?>" class="img-thumbnail" width="80px"></td>
                </tr>
                <?php $i++; ?>
               <?php endforeach; ?>
               </tbody>
            </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->



      



        
     