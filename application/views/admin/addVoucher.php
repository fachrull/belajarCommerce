<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <h1 class="text-center">ADD VOUCHER</h1>
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
            <?= form_open_multipart('admin/addVoucher', array('class' => 'm-0 sky-form', 'id' => 'addProd')); ?>
              <label class="input mb-10">
              <label><strong>Voucher Code</strong></label>
                  <input class="form-control" name="kVoucher" type="text" placeholder="Voucher Code e.g= AGM_VCRXXXX">
              </label>
              <label class="input mb-10">
              <label><strong>Voucher Name</strong></label>
                  <input class="form-control" name="name" type="text" placeholder="Voucher Name">
              </label>
              <label class="input mb-10">
              <label><strong>Discount</strong></label>
                  <input class="form-control" name="discount" type="text" placeholder="Discount e.g= 0.7(70%)">
              </label>
              <label class="input mb-10">
              <label><strong>Limit Voucher</strong></label>
                  <input class="form-control" name="jumlah" type="text" placeholder="Limit Voucher">
              </label>
<!--              <div class="row mb-3">-->
<!--                <div class="col-md-12 cl-xs-12 select2-input-field">-->
<!--                  <label class="input mb-10">-->
<!--                    <select class="form-control select2" id="bonus" name="bonus[]" multiple="multiple"-->
<!--                     data-placeholder="Select a Bonus" data-role="tagsinput" style="width: 100%;">-->
<!--                      --><?php //foreach ($products as $product): ?>
<!--                        <option value="--><?//=$product['id']?><!--">--><?//= $product['name'];?><!--</option>-->
<!--                      --><?php //endforeach; ?>
<!--                    </select>-->
<!--                  </label>-->
<!--                </div>-->
<!--              </div>-->
              <div class="box-body pad pt-0 pl-0 pr-0 mb-10">
              <label><strong>Description</strong></label>
                <textarea id="desc" name="desc" rows="10" cols="80" placeholder="Description"></textarea>
              </div>
            <div class="row">
                <div class="col-md-6 text-felt">
                    <a href="<?=site_url('admin/allVoucher')?>" class="btn btn-oldblue btn-default">Cancel</a>
                </div>
                <div class="col-md-6 text-right">
                    <button id="submit" type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Add Voucher</button>
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
