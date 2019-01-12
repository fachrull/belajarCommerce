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
                    <?php endif; ?>
                <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
              <!-- /ALERT -->
              <form class="m-0 sky-form" action="<?= site_url('auth/regis');?>" method="post">
                <?php if($this->session->userdata('uType') == 2): ?>
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
                    <input name="owner" type="text" placeholder="Owner Name">
                  </label>
                  <label class="input mb-10">
                    <input name="add" type="text" placeholder="Address">
                  </label>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label class="input mb-10">
                        <input name="province" type="text" placeholder="Province">
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="input mb-10">
                        <input name="city" type="text" placeholder="City">
                      </label>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label class="input mb-10">
                        <input name="sub_district" type="text" placeholder="Sub District">
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="input mb-10">
                        <input name="pCode" type="text" placeholder="Postcode">
                      </label>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label class="input mb-10">
                        <input name="phone1" type="text" placeholder="Phone Number 1">
                      </label>
                    </div>
                    <div class="col col-md-6 mb-10">
                      <label class="input">
                        <input name="phone2" type="text" placeholder="Phone Number 2">
                      </label>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->userdata('uType') == 1): ?>
                  <p class="register-box-msg">Register a new Admin</p>
                  <label class="input mb-10">
                    <input name="uname" type="text" placeholder="Username">
                  </label>
                  <label class="input mb-10">
                    <input name="email" type="email" placeholder="Email address">
                  </label>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label class="input">
                        <input name="fname" type="text" placeholder="First name">
                      </label>
                    </div>
                    <div class="col col-md-6">
                      <label class="input">
                        <input name="lname" type="text" placeholder="Last name">
                      </label>
                    </div>
                  </div>
                  <label class="input mb-10">
                    <input name="phone" type="text" placeholder="Phone Number">
                  </label>
                  <label class="input mb-10">
                    <select class="form-control" name="adminType">
                      <option value="0" selected disabled>Admin Authority</option>
                      <option value="1">Super Admin</option>
                      <option value="2">Admin</option>
                    </select>
                  </label>
                <?php endif; ?>
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
