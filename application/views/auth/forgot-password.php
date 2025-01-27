  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Forgot your password ?</h1>
                  </div>

                  <?= $this->session->flashdata('massage'); ?>

                  <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                    <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
        
                  <div class="text-center">
                    <hr>
                    <a class="small" href="<?= base_url('auth'); ?>">Back to Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


