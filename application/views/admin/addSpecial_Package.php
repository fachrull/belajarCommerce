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
            <?php if($this->session->has_userdata('errorSpecialPackage')): ?>
              <div class="alert alert-mini alert-danger mb-30">
                <strong>Oh snap!</strong> <?= $this->session->flashdata('errorSpecialPackage');?>
              </div>
            <?php elseif($this->input->post('items') == NULL): ?>
              <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
            <?php endif;?>
            <!-- /ALERT -->
            <?= form_open_multipart('admin/addSpecial_package', array('class' => 'm-0 sky-form', 'id' => 'addSpecialPackage')); ?>
              <label class="input mb-10">
                  <input class="form-control" name="name" type="text" placeholder="Special Package Name">
              </label>
              <div class="row mb-3">
                <div class="col-md-12 cl-xs-12">
                  <button type="button" class="btn btn-oldblue mb-10" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i> Add Product
                  </button>
                </div>
              </div>
              <label class="input mb-3">
                <table class="table table-bordered table-striped" id="table_prodSizeSP">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Size</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <th colspan="3">Total</th>
                    <th id="ttlPrc">0</th>
                  </tfoot>
                  <tbody>
                  </tbody>
                </table>
              </label>
              <!-- <div class="row mb-3">
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
              </div> -->
              <!-- <label class="input mb-10">
                <input class="form-control" name="price" type="text" placeholder="Special Package Price">
              </label> -->
              <label class="input mb-10">
                <b>SKU</b>
                <input class="form-control" type="text" name="sku" placeholder="SPKGXXXX">
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
                    <button id="submitSpcl" type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Special Package</button>
                    <!-- <a id="submitSpcl" type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Special Package</a> -->
                </div>
            </div>
          </form>
          </div>
        </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Product</h4>
          </div>
          <div class="modal-body">
            <div class="row mb-20">
              <div class="col-xs-12 mb-20">
                <div class="product-detail">
                  <form class="m-0 sky-form" action="" method="post">
                    <label for="input mb-10" style="width:100%">
                      <label for="productSP">Product</label>
                      <select class="select-form form-control" id="productSP" name="product">
                        <option value="">Select Product</option>
                        <?php foreach ($products as $product): ?>
                          <option value="<?=$product['id']?>"><?= $product['name'];?></option>
                        <?php endforeach; ?>
                      </select>
                    </label>
                    <label class="input mb-10">
                      <label for="sizeSP">Size</label>
                      <select class="select-form form-control" id="sizeSP" name="size">
                        <option value="" disabled selected>Select Size</option>
                      </select>
                    </label>
                    <label class="input mb-10">
                      <label for="">Quantity</label>
                      <input class="form-control" type="number" id="qtySP">
                    </label>
                    <label class="input mb-10">
                      <label>Retail price</label>
                      <input type="text" class="form-control" disabled value="-" id="prcSP">
                    </label>
                    <label class="input mb-10">
                      <label>Price</label>
                      <input class="form-control" type="number" id="price" >
                    </label>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="closeModal" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" id="submitSP" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
