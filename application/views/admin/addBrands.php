<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
  <h1 class="text-center">ADD BRAND</h1>
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
              <form class="m-0 sky-form" action="<?= site_url('admin/addBrand');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <p class="register-box-msg">Add a new brand</p>
                <label class="input mb-10">
                  <input class="form-control" name="items" type="text" placeholder="Brand">
                </label>
                <label class="input mb-10">
                  <textarea id="editor1" name="desc" rows="8" cols="43" placeholder="Description"></textarea>
                </label>
                <label class="input mb-10">
                  <input type="file" name="brandPict" />
                </label>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i>ADD</button>
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
