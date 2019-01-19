<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add store product
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs">
        <div class="box">
          <div class="box-header pb-0">
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 col-sm-6">
                <!-- ALERT -->
                <?php if($this->session->has_userdata('error')): ?>
                  <div class="alert alert-mini alert-danger mb-30">
                    <strong>Oh snap!</strong> <?= $this->session->userdata('error')?>
                  </div>
                <?php else: ?>
                  <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
                <?php endif; ?>
                <!-- /ALERT -->
                <form class="m-0 sky-form" action="<?= site_url('admin/storeProd/'.$storeId['idStore']);?>" method="post">
                    <p class="register-box-msg">Add product to store</p>
                    <label class="input mb-10">
                      <select class="form-control" name="product">
                        <option selected disabled>Select Product</option>
                        <?php foreach ($products as $product): ?>
                          <option value="<?=$product['id']?>"><?=$product['name']?></option>
                        <?php endforeach; ?>
                      </select>
                    </label>
                    <label class="input mb-10">
                      <input type="hidden" name="idStore" value="<?= $storeId['idStore'];?>">
                    </label>
                    <div class="row">
                      <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Add</button>
                        <!-- <a href="<?=site_url('admin/detailStore');?>" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Add</a> -->
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
