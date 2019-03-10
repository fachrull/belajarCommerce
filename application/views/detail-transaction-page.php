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
                                <label class="pt-0 fs-16"><?= $detailOrder[0]->order_number?></label>
                              </div>
                              <div class="col-6 col-md-6 pt-10">
                                <p class="btn <?= $detailOrder[0]->class?> btn-sm float-right"><?= $detailOrder[0]->status?></p>
                              </div>
                            </div>

                            <hr>

                            <label class="fs-12 mb-0">Tanggal Order</label>
                            <label class="pt-0 fs-16"><?= $detailOrder[0]->order_date?></label>

                            <hr>

                            <label class="fs-12 mb-0">Alamat Pengiriman</label>
                            <label class="pt-0 fs-16 mb-0"><?= $detailOrder[0]->address?></label>
                            <label class="pt-0 fs-16 mb-0"><?= $detailOrder[0]->kecamatan.', '.$detailOrder[0]->kabupaten?></label>
                            <label class="pt-0 fs-16 mb-0"><?= $detailOrder[0]->kabupaten.','.$detailOrder[0]->postcode?></label>
                            <label class="pt-0 fs-16 mb-0">Telefon/Handphone: <?= $detailOrder[0]->phone?></label>

                            <hr>

                            <!-- item -->
                            <label class="fs-12 mb-10">Daftar Barang</label>
                            <?php foreach ($detailOrder as $order): ?>
                                <div class="card card-success rad-0 mb-20">
                                    <div class="card-heading">
                                        <p class="card-title mb-0 mt-0"><strong><?= $order->name?></strong></p>
                                    </div>
                                    <div class="testimonial">
                                        <figure class="float-left ml-15">
                                            <img class="square" src="<?= base_url('asset/upload/'.$order->image)?>" alt="" />
                                        </figure>
                                        <div class="testimonial-content fs-14 line-height-20 ml-20 align-middle font-weight-light">
                                            <p>Jumlah: <?= $order->quantity?></p>
                                            <p>Size: <?= $order->size_name.' ('.$order->size.')'?></p>
                                            <p>Harga Total: Rp. <?= $order->total?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <!-- /item -->
                            <hr>

                            <!-- <label class="fs-12 mb-0">Keterangan</label>

                            <hr>

                            <label class="fs-12 mb-0">Status Tagihan</label>

                            <hr>

                            <label class="fs-12 mb-0">Metode Pembayaran</label>

                            <hr>

                            <label class="fs-12 mb-0">Total Pembayaran</label>

                            <hr> -->

                          </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / -->
