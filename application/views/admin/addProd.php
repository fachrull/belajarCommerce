<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <h1 class="text-center">ADD PRODUCT</h1>
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
            <?= form_open_multipart('admin/addProd', array('class' => 'm-0 sky-form', 'id' => 'addProd')); ?>
            <p class="register-box-msg">Add a new product</p>
              <div class="row mb-3">
                  <div class="col-md-6 col-xs-12">
                      <label class="input" style="width:100% !important">
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
                <input class="form-control" type="text" name="pName" placeholder="Product Name">
              </label>
              <div class="row mb-3">
                  <div class="col col-md-6 col-xs-12">
                      <label class="input">
                        <select class="form-control" id="size" name="size">
                          <option value=""selected disabled>Size</option>
                          <?php foreach($sizes as $size): ?>
                            <option value="<?= $size['id'];?>"><?=$size['name'];?> (<?=$size['size'];?>)</option>
                          <?php endforeach; ?>
                        </select>
                      </label>
                  </div>
                  <div class="col col-md-5 col-xs-12">
                      <label class="input mb-10">
                          <input class="form-control" type="text" name="price" placeholder="Price (e.g 100000)">
                      </label>
                  </div>
                  <div class="col col-md-1 col-xs-12">
                    <button type="button" id="sizePrice" class="btn btn-oldblue pull-right"><i class="fa fa-plus"></i>Add</button>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12 cl-xs-12">
                  <table id="table_sizePrice" class="mb-10 table table-bordered table-striped">
                    <thead>
                      <th class="hide">Id</th>
                      <th>Size</th>
                      <th>Price</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12 cl-xs-12 select2-input-field">
                  <label class="input mb-10">
                    <select class="form-control select2" id="spec" name="spec[]" multiple="multiple"
                     data-placeholder="Select a spec" data-role="tagsinput" style="width: 100%;">
                      <?php foreach ($specs as $spec): ?>
                        <option value="<?=$spec['id']?>"><?= $spec['name'];?></option>
                      <?php endforeach; ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class="box-body pad pt-0 pl-0 pr-0 mb-10">
                <textarea id="editor1" name="desc" rows="10" cols="80" placeholder="Description"></textarea>
              </div>
              <label class="input mb-10"><b>Upload product image</b>
              <p class="help-block text-danger fs-12">Max. Size 2 MB and Resolution 700 x 670 pixels</p>
                <input type="file" class="mt-5" name="productPict" />
              </label>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button id="submit" type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Product</button>
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
