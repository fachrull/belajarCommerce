<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- -->
<section class="section-xs">
    <div class="container">
        <div class="row">

            <!-- LEFT -->

            <!-- CATEGORIES -->
            <div class="col-12 col-md-3 order-md-1 order-lg-1">

              <div class="side-nav mb-60">

                <div class="side-nav-head" data-toggle="collapse" data-target="#categories">
                  <button class="fa fa-bars btn btn-mobile"></button>
                  <h4>STATUS</h4>
                </div>

                <ul id="categories" class="list-group list-unstyled">

                  <li class="fs-13 list-group-item"><a href="<?= base_url('home/transactionPage');?>"> Status Transaksi</a></li>
                  <li class="fs-13 list-group-item"><a href="<?= base_url('home/historyPage');?>"> History</a></li>
                  <li class="fs-13 list-group-item"><a href="<?= base_url('home/profilePage');?>"> Profil</a></li>
                </ul>

              </div>
            </div>
            <!-- /CATEGORIES -->

            <!-- RIGHT -->
            <div class="col-12 col-md-9 mb-80 order-md-2 order-lg-1">

                <div class="side-custom-content float-left mt-0">

                    <div class="row">
                      <div class="col-12 col-md-12">
                        <h2 class="fs-16 font-regular mb-20 mt-6">
                          Detail Transaksi
                          <span class="text-muted"></span>
                        </h2>

                        <div class="row ml-0 mrad-0">

                          <div class="col-12 mb-20">

                            <!-- <div class="row">
                              <div class="col-6 col-md-6 float-left">
                                <label class="fs-12 mb-0">Nomor Transaksi</label>
                                <label class="pt-0 fs-16"><?= $detailOrder['order_number']?></label>
                              </div>
                              <div class="col-6 col-md-6 float-right">
                                <a class="btn <?= $detailOrder['class']?> btn-sm float-right"><?= $detailOrder['status']?></a>
                              </div>
                            </div> -->
                            <div class="row ml-0 mr-0">
                              <div class="col-6 col-md-6">
                                <label class="fs-12 mb-0">Nomor Transaksi</label>
                                <label class="pt-0 fs-16"><?= $detailOrder['order_number']?></label>
                              </div>

                              <div class="col-6 col-md-6 pt-10">
                                  <?php
                                  switch($detailOrder['status_order']) {
                                      case 1:
                                          echo "<span class=\"badge badge-success float-right\">Pesanan Selesai</span>";
                                          break;
                                      case 2:
                                          echo "<span class=\"badge badge-warning btn-sm float-right\">Menunggu Pembayaran</span>";
                                          break;
                                      case 3:
                                          echo "<span class=\"badge badge-danger btn-sm float-right\">Pesanan Dibatalkan</span>";
                                          break;
                                      case 4:
                                          echo "<span class=\"badge badge-secondary btn-sm float-right\">Pesanan diproses</span>";
                                          break;
                                      case 5:
                                          echo "<span class=\"badge badge-secondary btn-sm float-right\">Pesanan Dikirim</span>";
                                          break;
                                      default:
                                          break;
                                  } ?>

                              </div>
                            </div>

                              <hr>
                              <div class="row ml-0 mr-0">
                                  <div class="col-6 col-md-6">
                                      <label class="fs-12 mb-0">Tanggal Order</label>
                                      <label class="pt-0 fs-16"><?= $detailOrder['order_date']?></label>
                                  </div>
                                  <div class="col-6 col-md-6">
                                      <label class="fs-12 mb-0">Total Pembayaran</label>
                                      <label class="pt-0 fs-16">Rp. <?= number_format(floatval($detailOrder['total']), 0, ',', '.')?></label>
                                  </div>
                              </div>
                            <hr>

                            <label class="fs-12 mb-0">Alamat Pengiriman</label>
                            <label class="pt-0 fs-16 mb-0"><?= $detailOrder['address']?></label>
                            <label class="pt-0 fs-16 mb-0"><?= $detailOrder['kecamatan'].', '.$detailOrder['kabupaten']?></label>
                            <label class="pt-0 fs-16 mb-0"><?= $detailOrder['provinsi'].','.$detailOrder['postcode']?></label>
                            <label class="pt-0 fs-16 mb-0">Telefon/Handphone: <?= $detailOrder['phone']?></label>

                            <hr>

                            <!-- item -->
                            <label class="fs-12 mb-10">Daftar Barang</label>
                            <?php foreach ($listOrder as $order): ?>
                              <?php if ($order['special'] == TRUE): ?>
                                <div class="card card-success rad-0 mb-20">
                                  <div class="card-heading">
                                    <a href="<?= site_url('home/detailSpecial/'.$order['id_product']);?>">
                                      <p class="card-title mb-0 mt-0"><strong><?= $order['name']?></strong></p>
                                    </a>
                                  </div>
                                  <div class="testimonial">
                                    <figure class="float-left ml-15">
                                        <img class="square" src="<?= base_url('asset/upload/special-package/'.$order['image'])?>" alt="" />
                                    </figure>
                                    <div class="testimonial-content fs-14 line-height-20 ml-20 align-middle font-weight-light">
                                      <p>Jumlah: <?= $order['qty'];?></p>
                                      <p>Size: <b>Special Package</b></p>
                                      <p>Harga Total: <?= number_format(floatval($order['subtotal']),0,',','.')?></p>
                                    </div>
                                  </div>
                                </div>
                              <?php else: ?>
                                <div class="card card-success rad-0 mb-20">
                                  <div class="card-heading">
                                    <a href="<?= site_url('home/detailProduct/'.$order['id_product']);?>">
                                      <p class="card-title mb-0 mt-0"><strong><?= $order['name']?></strong></p>
                                    </a>
                                  </div>
                                  <div class="testimonial">
                                    <figure class="float-left ml-15">
                                        <img class="square" src="<?= base_url('asset/upload/'.$order['image'])?>" alt="" />
                                    </figure>
                                    <div class="testimonial-content fs-14 line-height-20 ml-20 align-middle font-weight-light">
                                      <p>Jumlah: <?= $order['qty']?></p>
                                      <p>Size: <?= $order['sizeName'].' ( '.$order['sizeDetail'].' )';?></p>
                                      <p>Harga Total: Rp <?= ($order['subtotal'] != 0 ? number_format(floatval($order['subtotal']),0,',','.'): $order['subtotal']);?></p>
                                    </div>
                                  </div>
                                </div>
                              <?php endif; ?>
                            <?php endforeach;?>
                            <!-- /item -->
                            <hr>
                          </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- / -->
