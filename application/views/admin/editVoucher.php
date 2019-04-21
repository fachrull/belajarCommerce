<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <h1 class="text-center">EDIT VOUCHER</h1>
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
            <?= form_open_multipart('admin/editVoucher/'.$voucher['id'], array('class' => 'm-0 sky-form', 'id' => 'editProd')); ?>
              <label class="input mb-10">
              <label><strong>Voucer Code</strong></label>
                <input class="form-control" name="kVoucher" type="text" value="<?=$voucher['kode_voucher']?>" placeholder="Kode Voucher e.g= AGM_VCRXXXX">
              </label>
              <label class="input mb-10">
              <label><strong>Voucher Name</strong></label>
                <input class="form-control" name="name" type="text" value="<?=$voucher['name']?>" placeholder="Voucher Name">
              </label>
              <label class="input mb-10">
              <label><strong>Discount</strong></label>
                <input class="form-control" name="discount" type="text" value="<?=$voucher['discount']?>" placeholder="Discount e.g= 0.7(70%)">
              </label>
              <label class="input mb-10">
              <label><strong>Limit</strong></label>
                <input class="form-control" name="jumlah" type="text" value="<?=$voucher['jumlah']?>" placeholder="Limit Voucher">
              </label>
              <div class="box-body pad pt-0 pl-0 pr-0 mb-10">
              <label><strong>Description</strong></label>
                <textarea id="desc" name="desc" rows="10" cols="80" placeholder="Description"><?=$voucher['description']?></textarea>
              </div>
            <div class="row">
            <div class="col-md-6 text-felt">
                    <a href="<?=site_url('admin/allVoucher')?>" class="btn btn-oldblue btn-default">Cancel</a>
                </div>
                <div class="col-md-6 text-right">
                    <button id="submit" type="submit" class="btn btn-oldblue btn-default"> SUBMIT</button>
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
