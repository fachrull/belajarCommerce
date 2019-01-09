<?php defined('BASEPATH') or exit('No directt script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container">
      <h1>REGISTER</h1>
    </div>
  </section>
  <!-- /PAGE HEADER -->
  <section class="content">
      <div class="container">
        <div class="row">

            <!-- LOGIN -->
            <div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3">

                <!-- ALERT -->
                <?php if($this->session->has_userdata('error')): ?>
                  <div class="alert alert-mini alert-danger mb-30">
                    <strong>Oh snap!</strong> <?= $this->session->userdata('error')?>
                  </div>
                <?php endif; ?>
                <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
                <!-- /ALERT -->

                <!-- register form -->
                <form class="m-0 sky-form boxed" action="<?= site_url('auth/regis');?>" method="post">
                    <header>
                        <i class="fa fa-users"></i> Register
                    </header>

                    <fieldset class="m-0">
                        <label class="input mb-10">
                            <input name="uname" type="text" placeholder="Username">
                        </label>
                        <label class="input mb-10">
                            <i class="ico-append fa fa-envelope"></i>
                            <input name="email" type="text" placeholder="Email address">
                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                        </label>
                        <?php if ($this->session->userdata('isLogin') == NULL): ?>
                          <label class="input mb-10">
                              <i class="ico-append fa fa-lock"></i>
                              <input name="password" type="password" placeholder="Password">
                              <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                          </label>
                          <label class="input mb-10">
                              <i class="ico-append fa fa-lock"></i>
                              <input name="conf_pass" type="password" placeholder="Confirm password">
                              <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
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
                          <label class="select mb-10">
                              <select class="custom-control-input" name="gender">
                                  <label class="input">
                                    <option value="0" selected disabled>Gender</option>
                                  </label>
                                  <label class="input">
                                    <option value="m">Male</option>
                                  </label>
                                  <label class="input">
                                    <option value="f">Female</option>
                                  </label>
                              </select>
                          </label>
                          <div class="mt-30">
                              <label class="checkbox m-0"><input class="checked-agree" type="checkbox" name="checkbox"><i></i>I
                                  agree to the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of Service</a></label>
                              <!-- <label class="checkbox m-0"><input type="checkbox" name="checkbox"><i></i>I want to receive
                                  news and special offers</label> -->
                          </div>
                        <?php endif; ?>
                        <?php if($this->session->userdata('uType') == 2): ?>
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
                                  <label class="input">
                                      <input name="phone1" type="text" placeholder="Phone Number 1">
                                  </label>
                              </div>
                              <div class="col col-md-6">
                                  <label class="input">
                                      <input name="phone2" type="text" placeholder="Phone Number 2">
                                  </label>
                              </div>
                          </div>
                        <?php endif; ?>
                        <?php if($this->session->userdata('uType') == 1): ?>
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
                    </fieldset>
                    <div class="row mb-20">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> REGISTER</button>
                        </div>
                    </div>

                </form>
                <!-- /register form -->

            </div>
            <!-- /LOGIN -->

        </div>
      </div>
  </section>
</div>
