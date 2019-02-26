<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
      <h1 class="text-center">ADD VOUCHER</h1>
      <div class="container-fluid">
        <div class="register-box mt-0">
          <div class="register-box-body">
            <div class="row">
              <div class="col-md-12 col-sm-6">
                <!-- ALERT -->
                  <div class="alert alert-mini alert-danger mb-30">
                    <strong>Oh snap!</strong> <?= $this->session->flashdata('error');?>
                  </div>
                <!-- /ALERT -->
                <form class="m-0 sky-form" action="<?= site_url('admin/addCat');?>" method="post">
                  <p class="register-box-msg">Add a new voucher</p>
                  <label class="input mb-10">
                    <input name="items" type="text" placeholder="Voucher Code">
                  </label>
                  <label class="input mb-10">
                    <input name="items" type="text" placeholder="Discount">
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
