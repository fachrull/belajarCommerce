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
								    <a href="<?= base_url('home/wishlistPage');?>"> Wishlist
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
                                        <i class="fa fa-bar-chart-o mr-10"></i> MY HISTORIES
                                        <span class="text-muted">(4)</span>
                                    </h2>

                                    <!-- item -->
                                    <div class="card card-success hover-shadow rad-0">
                                        <div class="card-heading">
                                            <a class="btn btn-success btn-sm float-right">Sampai Tujuan</a>
                                            <h2 class="card-title"><strong>KING KOIL</strong></h2>
                                        </div>
                                        <a href="#">
                                            <div class="testimonial">
                                                <figure class="float-left ml-15">
                                                    <img class="square" src="<?= site_url('asset/content-images/01.jpg');?>" alt="">
                                                </figure>
                                                <div class="testimonial-content fs-14 line-height-20 ml-20">
                                                    <p>4155</p>
                                                    <p>Rp. 30,000,000</p>
                                                    <p>10 January 2017</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- /item -->

                                    <!-- item -->
                                    <div class="card card-success hover-shadow rad-0">
                                        <div class="card-heading">
                                            <a class="btn btn-danger btn-sm float-right">Dibatalkan</a>
                                            <h2 class="card-title"><strong>KING KOIL</strong></h2>
                                        </div>
                                        <a href="#">
                                            <div class="testimonial">
                                                <figure class="float-left ml-15">
                                                    <img class="square" src="<?= site_url('asset/content-images/01.jpg');?>" alt="">
                                                </figure>
                                                <div class="testimonial-content fs-14 line-height-20 ml-20">
                                                    <p>4155</p>
                                                    <p>Rp. 30,000,000</p>
                                                    <p>10 January 2017</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- /item -->

                                    <!-- Item -->
                                    <div class="card card-success hover-shadow rad-0">
                                        <div class="card-heading">
                                            <a class="btn btn-warning btn-sm float-right">Menunggu Konfirmasi</a>
                                            <h2 class="card-title"><strong>KING KOIL</strong></h2>
                                        </div>
                                        <a href="#">
                                            <div class="testimonial">
                                                <figure class="float-left ml-15">
                                                    <img class="square" src="<?= site_url('asset/content-images/01.jpg');?>" alt="">
                                                </figure>
                                                <div class="testimonial-content fs-14 line-height-20 ml-20">
                                                    <p>4155</p>
                                                    <p>Rp. 30,000,000</p>
                                                    <p>10 January 2017</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- /item -->

                                    <div class="alert alert-light b-0">
                                        Maaf, anda belum memiliki order
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- / -->