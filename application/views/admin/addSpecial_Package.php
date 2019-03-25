<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <h1 class="text-center">ADD SPECIAL PACKAGE</h1>
      <div class="container-fluid">
        <div class="register-box mt-0" style="width: auto !important">
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
            <?= form_open_multipart('admin/addSpecial_package', array('class' => 'm-0 sky-form', 'id' => 'addProd')); ?>
              <label class="input mb-10">
                  <input class="form-control" name="name" type="text" placeholder="Special Package Name">
              </label>
              <div class="row mb-3">
                <div class="col-md-12 cl-xs-12 select2-input-field">
                  <label class="input mb-10">
                    <select class="form-control select2" id="product" name="product[]" multiple="multiple"
                     data-placeholder="Select Special Package Products" data-role="tagsinput" style="width: 100%;">
                      <?php foreach ($products as $product): ?>
                        <option value="<?=$product['id']?>"><?= $product['name'];?></option>
                      <?php endforeach; ?>
                    </select>
                  </label>
                </div>
              </div>
              <label class="input mb-10">
                <input class="form-control" name="price" type="text" placeholder="Special Package Price">
              </label>
              <div class="box-body pad pt-0 pl-0 pr-0 mb-10">
                <textarea id="editor1" name="desc" rows="10" cols="80" placeholder="Description Special Package"></textarea>
              </div>
              <label class="input mb-10"><b>Upload product image</b>
              <p class="help-block text-danger fs-12">Max. Size 2 MB and Resolution 700 x 670 pixels</p>
                <input class="form-control" type="file" class="mt-5" name="imageSP" />
              </label>
            <div class="row">
              <div class="col-md-6">
                  <a href="<?= site_url('admin/special_package')?>" class="btn btn-default">Back</a>
                  <!-- <button type="button" id="submit" name="button" class="btn btn-default">Test</button> -->
              </div>
                <div class="col-md-6 text-right">
                    <button id="submit" type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Special Package</button>
                    <!-- <button type="button" id="submit" name="button" class="btn btn-default">Test</button> -->
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
