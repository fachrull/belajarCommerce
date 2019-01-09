<?php defined('BASEPATH') or exit('No directt script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
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
                <form class="m-0 sky-form boxed" action="<?= site_url('auth/completing_profile');?>" method="post">
                    <header>
                        <i class="fa fa-users"></i>
                        complete the following profile
                    </header>

                    <fieldset class="m-0">
                    <?php if($this->session->userdata('uType') == 3): ?>
                    <label class="input mb-10">
                              <input type="text" name="company_name" placeholder="Company Name">
                          </label>
                          <label class="input mb-10">
                              <input type="text" name="owner_name" placeholder="Owner Name">
                          </label>
                          <label class="input mb-10">
                              <input type="text" name="address" placeholder="Address">
                          </label>
                          <label class="input mb-10">
                              <input type="number" name="phone1" placeholder="Phone Number 1">
                          </label>
                          <label class="input mb-10">
                              <input type="number" name="phone2" placeholder="Phone Number 2">
                          </label>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <label class="input mb-10">
                                      <input type="text" name="sub_district" placeholder="Sub District">
                                  </label>
                              </div>
                              <div class="col-md-6">
                                  <label class="input mb-10">
                                      <input type="text" name="postcode" placeholder="Postcode">
                                  </label>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <label class="input mb-10">
                                      <input type="text" name="province" placeholder="Province">
                                  </label>
                              </div>
                              <div class="col-md-6">
                                  <label class="input mb-10">
                                      <input type="text" name="city" placeholder="City">
                                  </label>
                              </div>
                          </div>
                          <label class="input mb-10">
                              <input type="password" name="new_pass" placeholder="Change Password">
                          </label>
                    <?php endif; ?>

                    <?php if($this->session->userdata('uType') == 2 || $this->session->userdata('uType') == 1): ?>
                          <label class="input mb-10">
                              <input type="text" name="first_name" value="<?= $user['first_name'];?>">
                          </label>
                          <label class="input mb-10">
                              <input type="text" name="last_name" value="<?= $user['last_name'];?>">
                          </label>
                          <label class="input mb-10">
                              <input type="number" name="phone" value="<?= $user['phone'];?>">
                          </label>
                          <label class="input mb-10">
                              <input type="password" name="new_pass" placeholder="Change Password">
                          </label>
                    <?php endif; ?>
                    </fieldset>
                    <div class="row mb-20">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-pencil"></i> UPDATE</button>
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
