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
                        <h4>NAVIGASI</h4>
                    </div>

                    <ul id="categories" class="list-group list-group-bordered list-group-noicon uppercase">

                        <li class="fs-13 bullet-bar">
            <a href="<?= base_url('home/historyPage');?>"> Riwayat
            </a>
        </li>
        <li class="fs-13">
            <a href="<?= base_url('home/transactionPage');?>"> Status Transaksi
            </a>
        </li>
        <li class="fs-13">
            <a href="<?= base_url('home/profilePage');?>"> Profil
            </a>
        </li>

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
                                Detail Transaction
                            </h2>
                            <table>
                              <thead>
                                <tr>
                                  <th>Order Number</th>
                                  <th>Product</th>
                                  <th>Size</th>
                                  <th>Image</th>
                                  <th>Quantity</th>
                                  <th>Total</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><?= $detailOrder['order_number']?></td>
                                  <td><?= $detailOrder['name']?></td>
                                  <td><?= $detailOrder['size_name'].'('.$detailOrder['size'].')'?></td>
                                  <td>
                                    <img src="<?= site_url('asset/upload/'.$detailOrder['image'])?>" style="height:50px; width:50px;">
                                  </td>
                                  <td><?= $detailOrder['quantity']?></td>
                                  <td><?= 'Rp '.$detailOrder['total']?></td>
                                  <td><?= $detailOrder['status']?></td>
                                </tr>
                              </tbody>
                            </table>
                            <hr>
                            <table>
                              <thead>
                                <tr>
                                  <th>Penerima</th>
                                  <th>Company Name</th>
                                  <th>Phone</th>
                                  <th>Alamat</th>
                                  <th>Province</th>
                                  <th>City</th>
                                  <th>District</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><?= $detailOrder['username']?></td>
                                  <td><?= $detailOrder['company_name']?></td>
                                  <td><?= $detailOrder['phone']?></td>
                                  <td><?= $detailOrder['address'].'('.$detailOrder['postcode'].')'?></td>
                                  <td><?= $detailOrder['provinsi']?></td>
                                  <td><?= $detailOrder['kabupaten']?></td>
                                  <td><?= $detailOrder['kecamatan']?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / -->
