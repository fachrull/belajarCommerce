<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Detail Voucher
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
          <h2><?= $voucher['name']?></h2>
          <div class="row">
          <div class="product-detail">
            <div class="col-xs-6">
            <div class="row">
                    <div class="col-xs-12">
                      <label class="input mb-10"> <p>Voucher Code</p>
                        <input name="pName" type="text" value="<?= $voucher['kode_voucher'];?>" disabled>
                      </label>
                    </div>
                    <div class="col-xs-12">
                      <label class="input mb-10"> <p>Voucher Name</p>
                        <input name="pName" type="text" value="<?= $voucher['name'];?>" disabled>
                      </label>
                    </div>
                    <div class="col-xs-12">
                      <label class="input mb-10"> <p>Quantity</p>
                        <input name="pName" type="text" value="<?= $voucher['jumlah']?>" disabled>
                      </label>
                    </div>
                    <!-- <div class="col-xs-12">
                      <label class="input mb-10"> <p>Expiry Date</p>
                        <input name="pName" type="text" value="" disabled>
                      </label>
                    </div> -->
                  </div>
                  </div>
                <div class="col-xs-12 col-md-6">
                  <div class="row">
                    <div class="col-xs-12 col-md-6">
                      <label class="input mb-10"> <p>Discount</p>
                        <input name="pName" type="text" value="<?= $voucher['discount']* 100?> %" disabled>
                      </label>
                    </div>
                    <div class="col-xs-12">
                      <label class="input"> <p>Bonus</p>
                        <ul class="mb-10">
                            <?php foreach ($detail_voucher as $detail_voucher): ?>
                              <li><?= $detail_voucher['name']?></li>
                            <?php endforeach; ?>
                        </ul>
                      </label>
                    </div>
                  </div>
                </div>
            <div class="col-xs-12">
              <label class="input"> <p>Description</p>
                <textarea name="" id="" cols="30" rows="10" readonly><?= $voucher['description']?></textarea>
              </label>
            </div>
              </div>
            </div>
            <button type="submit" class="btn btn-oldblue btn-default" style="float:right;">Edit Voucher</button>
            <a href="<?= site_url('admin/allVoucher')?>"><button class="btn btn-oldblue btn-default">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
