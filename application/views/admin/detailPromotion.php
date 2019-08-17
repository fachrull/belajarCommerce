<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Detail Promotion
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
          <h2>
            <?= $promotion['name']?>
            </h2>
          <div class="row">
            <div class="col-xs-6 mb-20">
            <img src="<?= base_url('asset/upload/'.$promotion['image']);?>" alt="<?= $promotion['name'];?>">
            </div>
            <div class="product-detail">
                <div class="col-xs-12 col-md-6 mb-20">
                  <div class="row pr-20">
                      <div class="table-responsive">
                          <table class="table">
                              <tr>
                                  <th>Period</th>
                                  <td><?= $promotion['start_date']." - ". $promotion['end_date']?></td>
                              </tr>
                              <tr>
                                <th>Kode Voucher</th>
                                <td><?= $promotion['kode_voucher']?></td>
                              </tr>
                              <tr>
                                <th>Discount</th>
                                <td><?= $promotion['discount']?></td>
                              </tr>
                              <tr>
                                <th>Jumlah</th>
                                <td><?= $promotion['jumlah']?></td>
                              </tr>
                              <tr>
                                  <th>Description</th>
                                  <td class="word-wrap"><?= $promotion['description'];?></td>
                              </tr>
                              <tr>
                                  <th>Status</th>
                                  <td><?php echo $promotion['status'] == 1? 'Active': 'Inactive'; ?></td>
                              </tr>
                          </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if ($this->session->userdata('uType') == 1): ?>
              <a href="<?=site_url('admin/editPromotion/'.$promotion['slugs'])?>" class="btn btn-oldblue btn-default" style="float:right;">Edit Promotion</a>
            <?php endif; ?>
            <a href="<?= site_url('admin/promotions');?>"><button class="btn btn-oldblue btn-default">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
