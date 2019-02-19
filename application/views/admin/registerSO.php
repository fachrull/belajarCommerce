<?php defined('BASEPATH') or exit('No direct access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
  <h1 class="text-center">REGISTER</h1>
    <div class="container-fluid">
      <div class="register-box mt-0">
        <div class="register-box-body">
          <div class="row">
            <div class="col-md-12 col-sm-6">
              <!-- ALERT -->
              <?php if($this->session->has_userdata('error')): ?>
                      <div class="alert alert-mini alert-danger mb-30">
                        <strong>Oh snap!</strong> <?= $this->session->userdata('error')?>
                      </div>
                    <?php else: ?>
                        <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
                    <?php endif;?>                
              <!-- /ALERT -->
              <form class="m-0 sky-form" action="<?= site_url('auth/regisSO');?>" method="post">
                  <p class="register-box-msg">Register a new Store Owner</p>
                  <label class="input mb-10">
                    <input name="uname" type="text" placeholder="Username">
                  </label>
                  <label class="input mb-10">
                    <input name="email" type="email" placeholder="Email address">
                  </label>
                  <label class="input mb-10">
                    <input name="company_name" type="text" placeholder="Company Name">
                  </label>
                  <label class="input mb-10">
                    <input name="add" type="text" placeholder="Address">
                  </label>
                  <label class="input mb-10">
                    <input name="add2" type="text" placeholder="Address 2">
                  </label>
                  <label class="input mb-10">
                    <select class="form-control" name="province" id="province">
                      <option selected disabled>Province</option>
												<?php foreach ($provinces as $province): ?>
													<option value="<?= $province['id_prov']?>"><?= $province['nama']?></option>
												<?php endforeach; ?>
                    </select>
                  </label>
                  <label class="input mb-10">
                    <select class="form-control" name="city" id="city">
                      <option selected disabled>City</option>
                    </select>
                  </label>
                  <label class="input mb-10">
                    <select class="form-control" name="sub_district" id="sub_district">
                      <option selected disabled>Sub District</option>
                    </select>
                  </label>
                  <label class="input mb-10">
                    <input name="pCode" type="text" placeholder="Postcode">
                  </label>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label class="input mb-10">
                        <input name="phone1" type="text" placeholder="Phone Number">
                      </label>
                    </div>
                    <div class="col col-md-6 mb-10">
                      <label class="input">
                        <input name="fax" type="text" placeholder="Fax">
                      </label>
                    </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label class="input mb-10">
                              <input name="lat" type="text" placeholder="Latitude">
                          </label>
                      </div>
                      <div class="col col-md-6 mb-10">
                          <label class="input mb-10">
                              <input name="lng" type="text" placeholder="Langtitude">
                          </label>
                      </div>
                  </div>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> REGISTER</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
