<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <h1 class="text-center">EDIT <?= $detail_SP['name']?></h1>
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
            <?= form_open_multipart('admin/edit_special/'.$detail_SP['id'], array('class' => 'm-0 sky-form', 'id' => 'addSpecialPackage')); ?>
            <input type="hidden" name="idSP" value="<?= $detail_SP['id']?>">
              <label class="input mb-10">
                  <input class="form-control" name="name" type="text" value="<?= $detail_SP['name']?>">
              </label>
              <div class="row mb-3">
                <div class="col-md-12 cl-xs-12">
                  <button type="button" class="btn btn-oldblue" data-toggle="modal" data-target="#modal-default">
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
                  <tbody>
                    <?php foreach ($prod_SP as $prod_SP): ?>
                      <tr id="<?= $prod_SP['prodSize_id']?>">
                        <td><?= $prod_SP['prod']?></td>
                        <td><?= $prod_SP['sizeName'].' ('.$prod_SP['sizeDetail'].')'?></td>
                        <td class="qtySP-value"><?= $prod_SP['quantity']?></td>
                        <td class="priceSP-value"><?= number_format($prod_SP['priceSpcl'], 0,',','.')?></td>
                        <td>
                          <button class="btn btn-oldblue btn-sm" data-toggle="modal" data-id="<?= $prod_SP['prodSize_id']?>" data-target="#modal-edit-size" type="button">
                            <i class="fa fa-edit"></i>
                          </button>
                          <button class="btn btn-danger btn-sm" type="button" onclick="removeSize(<?= $prod_SP['prodSize_id']?>)">
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                        <td class="sizeSP-value hide"><?= $prod_SP['prodSize_id']?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </label>
              <div class="box-body pad pt-0 pl-0 pr-0 mb-10">
                <textarea id="editor1" name="desc" rows="10" cols="80" placeholder="Description Special Package"><?= $detail_SP['description']?></textarea>
              </div>
              <label class="input mb-10">
                <?php if ($detail_SP['image'] != NULL): ?>
                  <b>Special package image</b><br>
                  <div class="col-xs-12 mb-20 img-wrap" style="position:relative">
                    <a href="<?= site_url('admin/deleteSP_img/'.$detail_SP['id'])?>"
                      style="position: absolute; right:260px; top:10px;" class="btn btn-danger float right"
                      onclick="return confirm('Are you sure?')">
                      <i class="fa fa-close"></i>
                    </a>
                    <img style="display: block; height:300px; weight:auto; margin-left:auto; margin-right: auto;"
                    class="img-thumbnail" src="<?= site_url('asset/upload/special-package/'.$detail_SP['image'])?>" alt="<?= $detail_SP['name']?>">
                  </div>
                <?php else: ?>
                  <b>Upload special package image</b>
                  <p class="help-block text-danger fs-12">Max. Size 2 MB and Resolution 700 x 670 pixels</p>
                  <input class="form-control" type="file" class="mt-5" name="imageSP" />
                <?php endif; ?>
              </label>
            <div class="row">
              <div class="col-md-6">
                  <a href="<?= site_url('admin/detailSpecialPackage/'.$detail_SP['id'])?>" class="btn btn-default">Back</a>
                  <!-- <button type="button" id="submit" name="button" class="btn btn-default">Test</button> -->
              </div>
                <div class="col-md-6 text-right">
                    <button type="submit" id="submitSpcl" class="btn btn-oldblue btn-default"><i class="fa fa-edit"></i> Special Package</button>
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
                    <label for="input mb-10">
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
                        <option value="">Select Size</option>
                      </select>
                    </label>
                    <label class="input mb-10">
                      <label for="">Quantity</label>
                      <input class="form-control" type="number" id="qtySP">
                    </label>
                    <label class="input mb-10">
                      <label for="price">Price</label>
                      <input class="form-control" type="text" id="price" name="" value="">
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
