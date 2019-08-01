<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
      <h1 class="text-center">ADD BEST SELLER</h1>
      <div class="container-fluid">
        <div class="register-box mt-0">
          <div class="register-box-body">
            <div class="row">
              <div class="col-md-12 col-sm-6">
                <!-- ALERT -->
                <?php if($this->input->post('items') == NULL): ?>
                 <?=validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
                <?php endif;?>
                <!-- /ALERT -->
                <form class="m-0 sky-form" action="<?= site_url('admin/addBestSeller');?>" method="post">
                  <p class="register-box-msg">Add a new best seller</p>
                  <label class="input mb-10">
                    <label for="">Product</label>
                    <select class="select-form form-control" name="product">
                      <option value="" selected disabled>Select Product</option>
                      <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id']?>"><?= $product['name']?></option>
                      <?php endforeach; ?>
                    </select>
                  </label>
                  <div class="col-xs-12">
                    <div class="row">
                      <div class="col-md-6 pl-0">
                        <a href="<?= site_url('admin/bestSeller')?>" class="btn btn-oldblue btn-default">Back</a>
                      </div>
                      <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i>ADD</button>
                      </div>
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
