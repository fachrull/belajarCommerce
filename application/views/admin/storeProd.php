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
                <form class="m-0 sky-form" id="productToStore" action="<?= site_url('admin/storeProd/'.$storeId['idStore']);?>" method="post">
                    <p class="register-box-msg">Add product to store</p>
                    <label class="input mb-10">
                      <select id="product" class="form-control" name="product">
                        <option selected disabled>Select Product</option>
                        <?php foreach ($products as $product): ?>
                          <option value="<?=$product['id']?>"><?=$product['name']?></option>
                        <?php endforeach; ?>
                      </select>
                    </label>
                    <label class="input mb-10">
                      <input type="hidden" name="idStore" value="<?= $storeId['idStore'];?>">
                    </label>
                <div class="row mb-3">
                  <div class="col col-md-11 col-xs-12">
                      <label class="input">
                        <select class="form-control" id="size" name="size">
                          <option value=""selected disabled>Size</option>
                          <?php foreach($sizes as $size): ?>
                            <option value="<?= $size['id'];?>"><?=$size['name'];?> (<?=$size['size'];?>)</option>
                          <?php endforeach; ?>
                        </select>
                      </label>
                  </div>
                  <div class="col col-md-1 col-xs-12">
                    <button type="button" id="sizePriceStore" class="btn btn-oldblue pull-right"><i class="fa fa-plus"></i>Add</button>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12 cl-xs-12">
                  <table id="table_sizePrice" class="mb-10 table table-bordered table-striped">
                    <thead>
                        <th class="hide">id</th>
                      <th>Size</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
                    <div class="row">
                      <div class="col-md-12 text-right">
                        <button id="submit" type="submit" class="btn btn-oldblue btn-default">Submit</button>
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
