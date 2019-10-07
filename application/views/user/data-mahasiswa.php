<!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
             <?= form_open('user/searchMahasiswa'); ?>
           <input type="text" name="keyword" id="keyword" class="" placeholder="Search for...">
              <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
              </button>
              <?= form_close(); ?> 
          </div>
          <!-- Page Heading -->
           
        <div class="row">
          <div class="col-lg-8">
            <a class="btn btn-warning" href="<?= base_url('user/printmahasiswa/'); ?>"><i class="fa fa-print"></i>print</a><p>
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
                    <a class="badge badge-primary" href="<?= base_url('user/detailmahasiswa/'); ?><?= $n['id'];?>">detail</a>
                  </td>
                </tr>
                <?php $i++; ?>
            	 <?php endforeach; ?>
            </tbody>
        	</table>
          </div>
        </div>
          <?= form_close(); ?>       	

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->



      



       	
     