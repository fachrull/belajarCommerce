<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Detail Special Package
    </h1>
  </section>
  <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <h2 class="mt-0">
                    <?= $detail_SpclPckg['name']?>
                    </h2>
                    <div class="row text-center mb-20">
                        <div class="col-xs-12 mb-20">
                            <img style="width:300px !important; height:auto;" src="<?= base_url('asset/upload/special-package/'.$detail_SpclPckg['image'])?>" src=">" alt="<?= $detail_SpclPckg['name']?>">
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-xs-6">
                            <div class="box-header pb-0">
                                <h3 class="box-title">Package</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered text-center">
                                    <tbody class="text-center">
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th>Quantity</th>
                                        <th>Image</th>
                                    </tr>
                                    <?php $no = 1; foreach ($prod_SpclPckg as $prod_SpclPckg): ?>
                                      <tr>
                                          <td><?= $no?>.</td>
                                          <td><?= $prod_SpclPckg['prod']?></td>
                                          <td><?= $prod_SpclPckg['sizeName'].' ('.$prod_SpclPckg['sizeDetail'].')'?></td>
                                          <td><?= $prod_SpclPckg['quantity']?></td>
                                          <td>
                                          <img style="height:50px;width:auto !important;" src="<?= base_url('asset/upload/'.$prod_SpclPckg['image'])?>" alt="<?= $prod_SpclPckg['prod']?>">
                                          </td>
                                      </tr>
                                    <?php $no++;endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div>
                                <h4>Price</h4>
                                <small>Starts from</small>
                                <p class="fs-15"><strong>Rp <?= number_format($detail_SpclPckg['price'],0,',','.')?></strong></p>
                            </div>
                            <div class="mt-20">
                                <h4>Description</h4>
                                <textarea name="" id="" cols="65" rows="10" readonly><?= $detail_SpclPckg['description']?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-20">
                        <a href="<?= site_url('admin/edit_special/'.$detail_SpclPckg['id']);?>" class="btn btn-oldblue btn-default" style="float:right;">Edit Product</a>
                        <a href="<?= site_url('admin/special_package');?>"><button class="btn btn-oldblue btn-default">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
