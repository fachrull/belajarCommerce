<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

    <section class="page-header page-header-md">
            <div class="container">

                <h1>PRODUCT TITLE</h1>

                <!-- breadcrumbs -->
                <ol class="breadcrumb">
                    <li><a href="index-home-before-login.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li class="active">Detail Product</li>
                </ol><!-- /breadcrumbs -->

            </div>
        </section>
        <!-- /PAGE HEADER -->

        <section>
            <div class="container">

                <div class="row">

                    <!-- LEFT -->

                    <!-- CATEGORIES -->
                    <div class="col-lg-3 col-md-3 col-sm-3 order-md-1 order-lg-1">

                        <div class="side-nav mb-60">

                            <div class="side-nav-head" data-toggle="collapse" data-target="#categories">
                                <button class="fa fa-bars btn btn-mobile"></button>
                                <h4>CATEGORIES</h4>
                            </div>

                            <ul id="categories" class="list-group list-group-bordered list-group-noicon uppercase">
                                <li class="list-group-item active">
                                    <a class="dropdown-toggle" href="#">AIRELOOM</a>
                                    <ul>
                                        <li class="list-group-item active">
                                            <a class="dropdown-toggle" href="#">MATTRESS</a>
                                            <ul>
                                                <li class="bullet-bar"><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Imperial Heritage</a></li>
                                                <li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Royal Souvergin</a></li>
                                                <li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Conoration</a></li>
                                                <li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Baron</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <!-- /CATEGORIES -->

                        <!-- BRANDS -->
                        <div class="side-nav mb-60">

                            <div class="side-nav-head" data-toggle="collapse" data-target="#brands">
                                <button class="fa fa-bars btn btn-mobile"></button>
                                <h4>BRANDS</h4>
                            </div>

                            <ul id="brands" class="list-group list-unstyled">
                                <li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(21)</span> Aireloom</a></li>
                                <li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(44)</span> KingKoil</a></li>
                                <li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(2)</span> Serta</a></li>
                                <li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(18)</span> Tempur</a></li>
                                <li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(87)</span> Stressless</a></li>
                                <li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(32)</span> Florence</a></li>
                            </ul>

                        </div>
                        <!-- BRANDS -->
                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-9 col-md-9 col-sm-9 order-md-2 order-lg-2">

                        <div class="row">

                            <!-- IMAGE -->
                            <div class="col-lg-6 col-sm-6">

                                <div class="thumbnail relative mb-3">
                                    <figure id="zoom-primary" class="zoom" data-mode="mouseover">
                                        <a class="lightbox bottom-right" src="<?= base_url('');?>asset/content-images/slider-1.jpg" data-plugin-options='{"type":"image"}'><i
                                             class="glyphicon glyphicon-search"></i></a>
                                        <img class="img-fluid" src="<?= base_url('');?>asset/content-images/slider-1.jpg" alt="This is the product title" />
                                    </figure>

                                </div>

                                <div class="tabbed hidden-lg-down text-center">

                                    <a href="1" id="1">
                                        <img class="thumbnail-specs" src="assets/logo-specs/5-zone-pocket-spring.png.pagespeed.ce.MDUzM1LUYu.png" alt="">
                                        <div class="text-center">
                                            <h3>5-Zone Pocket Spring</h3>
                                        </div>

                                    </a>
                                    <a href="2" id="2">
                                        <img class="thumbnail-specs" src="assets/logo-specs/foam-encasement.png.pagespeed.ce.iLu1NYhomc.png" alt="">
                                        <div class="text-center">
                                            <h3>Foam Encasement</h3>
                                        </div>
                                    </a>
                                    <a href="3" id="3">
                                        <img class="thumbnail-specs" src="assets/logo-specs/latex-layer.png.pagespeed.ce.cEw6speVi2.png" alt="">
                                        <div class="text-center">
                                            <h3>Latex Layer</h3>
                                        </div>
                                    </a>
                                    <a href="4" id="4">
                                        <img class="thumbnail-specs" src="assets/logo-specs/mega-pillow-top.png.pagespeed.ce.Qsl7aCiFS1.png" alt="">
                                        <div class="text-center">
                                            <h3>Mega Pillow Top</h3>
                                        </div>
                                    </a>
                                    <a href="5" id="5">
                                        <img class="thumbnail-specs" src="assets/logo-specs/plush-foam.png.pagespeed.ce.6KTnpPYD4F.png" alt="">
                                        <div class="text-center">
                                            <h3>Plush Foam</h3>
                                        </div>
                                    </a>
                                    <a href="6" id="6">
                                        <img class="thumbnail-specs" src="assets/logo-specs/premium-knit.png.pagespeed.ce.d6-d2Utu20.png" alt="">
                                        <div class="text-center">
                                            <h3>Premium Knit</h3>
                                        </div>
                                    </a>
                                    <a href="7" id="7">
                                        <img class="thumbnail-specs" src="assets/logo-specs/sleep-protection.png.pagespeed.ce.Mx0oz7h2WG.png" alt="">
                                        <div class="text-center">
                                            <h3>Sleep Protection</h3>
                                        </div>
                                    </a>

                                </div>

                            </div>
                            <!-- /IMAGE -->

                            <!-- ITEM DESC -->
                            <div class="col-lg-6 col-sm-6">

                                <!-- buttons -->
                                <div class="float-right">
                                    <!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                    <a class="btn btn-light add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i
                                         class="fa fa-heart p-0"></i></a>
                                </div>
                                <!-- /buttons -->

                                <!-- price -->
                                <div class="shop-item-price">
                                    <span class="line-through pl-0">Rp. 2,000,000</span>
                                    Rp. 1,800,000
                                </div>
                                <!-- /price -->

                                <hr />

                                <div class="toggle">
                                    <label>Checking the stocks</label>

                                    <div class="toggle-content">
                                        <div class="clearfix mb-30">
                                            <span class="float-right text-oldblue"><i class="fa fa-check"></i> In Stock</span>
                                            <!--
                                                <span class="float-right text-danger"><i class="fa fa-remove"></i> Out of Stock</span>
                                                -->

                                            <strong>Available in your location</strong>
                                        </div>

                                        <form action="#" method="post" class="m-0">
                                            <label>Province</label>
                                            <select id="cart-tax-country" name="cart-tax-country" class="form-control pointer mb-20">
                                                <option value="Select" selected disabled> Select </option>
                                                <option value="1">DKI Jakarta</option>
                                                <option value="2">West Java</option>
                                                <option value="2">...........</option>
                                                <!-- add all here -->
                                            </select>

                                            <label>City</label>
                                            <select id="cart-tax-state" name="cart-tax-state" class="form-control pointer mb-20">
                                                <option value="Select" selected disabled> Select </option>
                                                <option value="1">Jakarta</option>
                                                <option value="2">Kota Bekasi</option>
                                                <option value="2">...........</option>
                                                <!-- add all here -->
                                            </select>

                                            <label>District</label>
                                            <select id="cart-tax-state" name="cart-tax-state" class="form-control pointer mb-20">
                                                <option value="Select" selected disabled> Select </option>
                                                <option value="1">Kebayoran Baru</option>
                                                <option value="2">Jatiasih</option>
                                                <option value="2">...........</option>
                                                <!-- add all here -->
                                            </select>

                                            <button class="btn btn-oldblue btn-block" type="submit">SUBMIT</button>
                                        </form>
                                    </div>


                                    <div class="clearfix mb-20 mt-20">
                                        <strong>Product Name</strong>
                                    </div>
                                </div>


                                <!-- short description -->
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <!-- /short description -->

                                <hr />

                                <!-- FORM -->
                                <div class="row full-width justify-content-center">
                                    <form class="clearfix form-inline m-0" method="get" action="shop-cart.html">
                                        <input type="hidden" name="product_id" value="1" />

                                        <!-- see assets/js/view/demo.shop.js -->
                                        <input type="hidden" id="qty" name="qty" value="1" />
                                        <input type="hidden" id="size" name="size" value="5" />
                                        <!-- see assets/js/view/demo.shop.js -->
                                        <div class="col-4 px-0">
                                            <div class="btn-group float-left product-opt-size">
                                                <button type="button" class="btn btn-default dropdown-toggle product-size-dd rad-0" data-toggle="dropdown">

                                                    Size <small id="product-selected-size">(<span>5</span>)</small>
                                                </button>

                                                <!-- data-val = size value or size id -->
                                                <ul id="product-size-dd" class="dropdown-menu" role="menu">
                                                    <li class="active"><a data-val="5" href="#">5</a></li>
                                                    <li><a data-val="5.5" href="#">5.5</a></li>
                                                    <li><a data-val="6" href="#">6</a></li>
                                                    <li><a data-val="6.5" href="#">6.5</a></li>
                                                    <li><a data-val="7" href="#">7</a></li>
                                                    <li><a data-val="7.5" href="#">7.7</a></li>
                                                    <li><a data-val="8" href="#">8</a></li>
                                                    <li><a data-val="8.5" href="#">8.5</a></li>
                                                    <li><a data-val="9" href="#">9</a></li>
                                                    <li><a data-val="9.5" href="#">9.5</a></li>
                                                    <li><a data-val="10" href="#">10</a></li>
                                                    <li><a data-val="10.5" href="#">10.5</a></li>
                                                    <li><a data-val="11" href="#">11</a></li>
                                                    <li><a data-val="11.5" href="#">11.5</a></li>
                                                    <li><a data-val="12" href="#">12</a></li>
                                                    <li><a data-val="13" href="#">13</a></li>
                                                    <li><a data-val="14" href="#">14</a></li>
                                                </ul>
                                            </div><!-- /btn-group -->
                                        </div>
                                        <div class="col-4 px-0">
                                            <div class="btn-group float-left product-opt-qty">
                                                <button type="button" class="btn btn-default dropdown-toggle product-qty-dd rad-0" data-toggle="dropdown">

                                                    Qty <small id="product-selected-qty">(<span>5</span>)</small>
                                                </button>

                                                <ul id="product-qty-dd" class="dropdown-menu clearfix" role="menu">
                                                    <li class="active"><a data-val="1" href="#">1</a></li>
                                                    <li><a data-val="2" href="#">2</a></li>
                                                    <li><a data-val="3" href="#">3</a></li>
                                                    <li><a data-val="4" href="#">4</a></li>
                                                    <li><a data-val="5" href="#">5</a></li>
                                                    <li><a data-val="6" href="#">6</a></li>
                                                    <li><a data-val="7" href="#">7</a></li>
                                                    <li><a data-val="8" href="#">8</a></li>
                                                    <li><a data-val="9" href="#">9</a></li>
                                                    <li><a data-val="10" href="#">10</a></li>
                                                </ul>
                                            </div><!-- /btn-group -->
                                        </div>
                                        <div class="col-4 px-0">

</section>
<!-- / -->
