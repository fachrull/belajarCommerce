<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <h1 class="text-center">ADD PRODUCT</h1>
      <div class="container-fluid">
        <div class="register-box mt-0">
          <div class="register-box-body">
          <div class="row">
          <div class="col-md-12 col-sm-6">
            <!-- ALERT -->
            <?php if($this->session->has_userdata('error')): ?>
              <div class="alert alert-mini alert-danger mb-30">
                <strong>Oh snap!</strong> <?= $this->session->flashdata('error');?>
              </div>
            <?php elseif($this->input->post('items') == NULL): ?>
              <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
            <?php endif;?>
            <!-- /ALERT -->
            <?= form_open_multipart('admin/addProd', array('class' => 'm-0 sky-form')); ?>
            <p class="register-box-msg">Add a new product</p>
              <div class="row mb-3">
                  <div class="col-md-6 col-xs-12">
                      <label class="input">
                          <select class="form-control" name="brand">
                            <option selected disabled>Select Brand</option>
                            <?php foreach ($brands as $brand): ?>
                              <option value="<?= $brand['id'];?>"><?= $brand['name'];?></option>
                            <?php endforeach; ?>
                          </select>
                      </label>
                  </div>
                  <div class="col col-md-6 col-xs-12">
                      <label class="input">
                          <select class="form-control" name="cat">
                            <option selected disabled>Select Category</option>
                            <?php foreach ($cats as $cat): ?>
                              <option value="<?= $cat['id'];?>"><?= $cat['name'];?></option>
                            <?php endforeach; ?>
                          </select>
                      </label>
                  </div>
              </div>
              <label class="input mb-10">
                  <input name="pName" type="text" placeholder="Product Name">
              </label>
              <div class="row mb-3">
                  <div class="col-md-6 col-xs-12">
                      <label class="input">
                          <input name="price" type="text" placeholder="Price (e.g 100000)">
                      </label>
                  </div>
                  <div class="col col-md-6 col-xs-12">
                      <label class="input">
                          <input name="sPrice" type="text" placeholder="Sub Price (e.g 100000)">
                      </label>
                  </div>
              </div>
              <label class="input mb-3">
                <textarea name="desc" rows="8" cols="141" placeholder="Description"></textarea>
              </label>
              <label class="input mb-10">
                <select class="form-control" name="spec">
                  <option selected disabled>Specification</option>
                  <?php foreach($specs as $spec): ?>
                    <option value="<?= $spec['id'];?>"><?= $spec['name'];?></option>
                  <?php endforeach; ?>
                </select>
              </label>
              <label class="input mb-10">
                <select class="form-control" name="size">
                  <option selected disabled>Size</option>
                  <?php foreach($sizes as $size): ?>
                    <option value="<?= $size['id'];?>"><?=$size['name'];?> (<?=$size['size'];?>)</option>
                  <?php endforeach; ?>
                </select>
              </label>
              <label class="input mb-10">
                <input type="file" name="productPict" />
              </label>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Product</button>
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
