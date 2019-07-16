<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- SLIDER -->
<section id="slider" class="fullheight mobile-fullheight">

    <div class="swiper-container" data-effect="slide" data-autoplay="false">
        <div class="swiper-wrapper">

            <!-- SLIDE 1 -->
            <div class="swiper-slide"
                 style="background-image: url(<?= base_url('asset/upload/'.$slides[0]['slide']); ?>);">
                <div class="overlay dark-2">
                    <!-- dark overlay [1 to 9 opacity] -->
                </div>

                <div class="display-table">
                    <div class="display-table-cell vertical-align-middle">
                        <div class="container">
                            <div class="row">
                                <div class="text-center col-md-8 col-xs-12 offset-md-2">
                                    <div class="fixed-bottom pb-10">
                                        <a class="btn btn-lg btn-exp scrollTo b-0" href="#product">EXPLORE
                                            <br><i class="fa fa-chevron-down"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /SLIDE 1 -->

        </div>
    </div>

</section>
<!-- /SLIDER -->

<!-- PRODUCT -->
<section id="product" class="section-lg pt-120 pb-60">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 pb-40">
                        <h3 class="text-center" style="letter-spacing: 3px;">SHOP BY BRAND</h3>
                    </div>
                </div>
                <div class="row text-center justify-content-between">
                    <div class="col-6 col-md-2 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/1'); ?>">
                            <img class="product-img wow fadeInUp" alt="Aireloom" data-wow-delay="0.2s"
                                 src="<?= base_url('asset/brands/Aireloom.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverAireloom.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/Aireloom.png"); ?>'"/>
                        </a>
                    </div>
                    <div class="col-6 col-md-2 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/2'); ?>">
                            <img class="product-img wow fadeInUp" alt="Kingkoil" data-wow-delay="0.2s"
                                 src="<?= base_url('asset/brands/King-koil.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverKing-koil.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/King-koil.png"); ?>'"/>
                        </a>
                    </div>
                    <div class="col-6 col-md-2 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/3'); ?>">
                            <img class="product-img wow fadeInUp" alt="Serta" data-wow-delay="0.2s"
                                 src="<?= base_url('asset/brands/Serta.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverSerta.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/Serta.png"); ?>'"/>
                        </a>
                    </div>
                    <div class="col-6 col-md-2 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/4'); ?>">
                            <img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Tempur"
                                 src="<?= base_url('asset/brands/Tempur.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverTempur.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/Tempur.png"); ?>'"/>
                        </a>
                    </div>
                    <div class="col-12 col-md-2 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/5'); ?>">
                            <img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Florence"
                                 src="<?= base_url('asset/brands/Florence.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverFlorence.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/Florence.png"); ?>'"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- /PRODUCT -->

<hr>

<!-- PROMOTION -->
<section id="promotion" style="background-color: #e6e7e8">
    <div class="container">
        <div class="row">
            <div class="col-12 pb-40">
                <h3 class="text-center" style="letter-spacing: 3px;">SPECIAL PACKAGES AND OFFERS</h3>
            </div>
        </div>
        <div class="row">
            <!--            # 1 Best seller-->
            <div class="col-12 col-md-4 pt-30">
                <div class="shop-item bg-white">
                    <div class="thumbnail">
                        <!-- product image(s) -->
                        <div class="text-block">
                            <p class="text-center" style="letter-spacing: 3px;"><b>BEST SELLER</b></p>
                        </div>

                        <a class="shop-item-image" href="<?=base_url("home/detailProduct/".$bestSeller[0]["id"])?>">
                            <img class="img-fluid" style="position: relative; z-index: auto"
                                 src="<?= site_url('asset/upload/'.$bestSeller[0]["image_1"]); ?>"
                                 alt="product name"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="shop-item-summary p-30">
                            <div class="row mb-10">
                                <div class="col-8">
                                    <h2 class="align-middle"><?=strtoupper($bestSeller[0]["name"])?></h2>
                                </div>
                                <div class="col-4">
                                    <div class="rating rating-<?=$bestSeller[0]["stars"]?> fs-13">
                                        <!-- rating-0 ... rating-5 -->
                                    </div>
                                </div>
                            </div>
                            <?php if ($bestSeller[0]["sub_price"] != 0) { ?>
                                <small class="text-muted">Was Rp <strike><?= number_format($bestSeller[0]["price"], 2, ",",
                                            "."); ?></strike></small>
                                <!-- price -->
                                <div class="shop-item-price">
                                    Rp <?= number_format($bestSeller[0]["sub_price"], 2, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } else { ?>
                                <small class="text-muted">&nbsp;</small>
                                <!-- price -->
                                <div class="shop-item-price">
                                    Rp <?= number_format($bestSeller[0]["price"], 2, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--            #2 Bed Linen-->
            <div class="col-12 col-md-4 pt-30">
                <div class="shop-item bg-white">
                    <div class="thumbnail">
                        <!-- product image(s) -->
                        <div class="text-block">
                            <p class="text-center" style="letter-spacing: 3px;"><b>BED LINEN</b></p>
                        </div>
                        <a class="shop-item-image" href="#">
                            <img class="img-fluid" style="position: relative; z-index: auto"
                                 src="<?= site_url('asset/upload/'.$bedLinen[0]["image_1"]); ?>"
                                 alt="product name"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="shop-item-summary p-30">
                            <div class="row mb-10">
                                <div class="col-8">
                                    <h2 class="align-middle"><?=strtoupper($bedLinen[0]["name"])?></h2>
                                </div>
                                <div class="col-4">
                                    <div class="rating rating-<?=$bedLinen[0]["stars"]?> fs-13">
                                        <!-- rating-0 ... rating-5 -->
                                    </div>
                                </div>
                            </div>
                            <?php if ($bedLinen[0]["sub_price"] != 0) { ?>
                                <small class="text-muted">Was Rp <strike><?= number_format($bedLinen[0]["price"], 2, ",",
                                            "."); ?></strike></small>
                                <!-- price -->
                                <div class="shop-item-price">
                                    Rp <?= number_format($bedLinen[0]["sub_price"], 2, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } else { ?>
                                <small class="text-muted">&nbsp;</small>
                                <!-- price -->
                                <div class="shop-item-price">
                                    Rp <?= number_format($bedLinen[0]["price"], 2, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--            #3 Bedding Accessories-->
            <div class="col-12 col-md-4 pt-30">
                <div class="shop-item bg-white">
                    <div class="thumbnail">
                        <!-- product image(s) -->
                        <div class="text-block">
                            <p class="text-center" style="letter-spacing: 3px;"><b>BEDDING ACCESSORIES</b></p>
                        </div>
                        <a class="shop-item-image" href="#">
                            <img class="img-fluid" style="position: relative; z-index: auto"
                                 src="<?= site_url('asset/upload/'.$beddingAcc[0]["image_1"]); ?>"
                                 alt="product name"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="shop-item-summary p-30">
                            <div class="row mb-10">
                                <div class="col-8">
                                    <h2 class="align-middle"><?=strtoupper($beddingAcc[0]["name"])?></h2>
                                </div>
                                <div class="col-4">
                                    <div class="rating rating-<?=$beddingAcc[0]["stars"]?> fs-13">
                                        <!-- rating-0 ... rating-5 -->
                                    </div>
                                </div>
                            </div>
                            <?php if ($beddingAcc[0]["sub_price"] != 0) { ?>
                                <small class="text-muted">Was Rp <strike><?= number_format($beddingAcc[0]["price"], 2, ",",
                                            "."); ?></strike></small>
                                <!-- price -->
                                <div class="shop-item-price">
                                    Rp <?= number_format($beddingAcc[0]["sub_price"], 2, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } else { ?>
                                <small class="text-muted">&nbsp;</small>
                                <!-- price -->
                                <div class="shop-item-price">
                                    Rp <?= number_format($beddingAcc[0]["price"], 2, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- /PROMOTION -->

<hr>

<!-- Online Promotions / Special Package -->
<section id="agmpedia" class="section-xs container">
    <div class="row">
        <div class="col-12 col-md-12">
            <img class="pedia-img-1" src="<?= site_url('asset/upload/UpperBannerAGM.jpg'); ?>"
                 alt="agmpedia">
            <div class="absolute justify-content-around pl-20 pb-20 text-left bg-gradient-red">
                <div class="ml-50 mt-150">
                    <h1 class="text-white mb-0">ONLINE<br>PROMOTION</h1>
                    <a class="btn btn-outline-white mt-10" href="<?= base_url('home/specialPackage'); ?>">Discover more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /AGMPEDIA -->

<hr>

<!-- Product Hightlight -->
<section id="promotion">
    <div class="container">
        <div class="row">
            <div class="col-12 pb-40">
                <h3 class="text-center" style="letter-spacing: 3px;">PRODUCT HIGHTLIGHT</h3>
            </div>
        </div>
        <div class="row">

            <?php
            foreach ($product_highlight as $p):
                ?>
                <div class="col-12 col-md-3 pt-30">
                    <div class="shop-item bg-white">
                        <div class="thumbnail-highlight">
                            <!-- product image(s) -->

                            <a class="shop-item-image" href="<?=base_url("home/detailProduct/".$p["id"])?>">
                                <img class="img-fluid" style="position: relative; z-index: auto"
                                     src="<?= site_url('asset/upload/'.$p["image_1"]); ?>"
                                     alt="product name"/>
                            </a>
                            <!-- /product image(s) -->

                            <div class="shop-item-summary p-15">
                                <div class="row mb-10">
                                    <div class="col-12">
                                        <h2 class="align-middle"><?=strtoupper($p["name"])?></h2>
                                    </div>
                                </div>
                                <?php if ($p["sub_price"] != 0) { ?>
                                    <small class="text-muted">Was Rp <strike><?= number_format($p["price"], 2, ",",
                                                "."); ?></strike></small>
                                    <!-- price -->
                                    <div class="shop-item-price">
                                        Rp <?= number_format($p["sub_price"], 2, ",", "."); ?>
                                    </div>
                                    <!-- /price -->
                                <?php } else { ?>
                                    <small class="text-muted">&nbsp;</small>
                                    <!-- price -->
                                    <div class="shop-item-price">
                                        Rp <?= number_format($p["price"], 2, ",", "."); ?>
                                    </div>
                                    <!-- /price -->
                                <?php } ?>
                                <div class="mt-15 rating rating-<?=$p["stars"]?> fs-14" style="letter-spacing: 1px;">
                                    <!-- rating-0 ... rating-5 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!--            # 1 Best seller-->

        </div>
        <!-- menu -->
        <div class="row pt-20">
            <!--            # 1 Store location-->
            <div class="col-3 col-md-3 p-0">
                <div class="shop-item bg-white">
                    <div class="thumbnail-menu p-0" style="border: 0px; border-radius: 0px !important;">
                        <a class="shop-item-image" href="<?=base_url('home/store-location')?>">
                            <img class="img-help" alt="stores"
                                 src="<?= site_url('asset/icon/Stores.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/icon/Stores-hover.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/icon/Stores.png"); ?>'"/>
                        </a>

                        <div class="shop-item-summary p-15">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <p class="text-center fs-20 text-help"><b>STORES</b></p>
                                    <p class="text-center fs-20 hidden-md-down">Lorem ipsum dolor sit amet</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--            # 2 Support-->
            <div class="col-3 col-md-3 p-0">
                <div class="shop-item bg-white">
                    <div class="thumbnail-menu p-0" style="border-radius: 0;">

                        <a class="shop-item-image" href="<?=base_url('home/pageContact')?>">
                            <img class="img-help" alt="support"
                                 src="<?= site_url('asset/icon/Support.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/icon/Support-hover.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/icon/Support.png"); ?>'"/>
                        </a>

                        <div class="shop-item-summary p-15">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <p class="text-center fs-20 text-help"><b>SUPPORT</b></p>
                                    <p class="text-center fs-20 hidden-md-down">Lorem ipsum dolor sit amet</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--            # 3 AGM Pedia-->
            <div class="col-3 col-md-3 p-0">
                <div class="shop-item bg-white">
                    <div class="thumbnail-menu p-0" style="border-radius: 0;">
                        <!-- product image(s) -->

                        <a class="shop-item-image" href="<?=base_url('home/listArticle')?>">
                            <img class="img-help" alt="agmpedia"
                                 src="<?= site_url('asset/icon/AGMPedia.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/icon/AGMPedia-hover.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/icon/AGMPedia.png"); ?>'"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="shop-item-summary p-15">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <p class="text-center fs-20 text-help"><b>AGM PEDIA</b></p>
                                    <p class="text-center fs-20 hidden-md-down">Lorem ipsum dolor sit amet</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--            # 4 Partnership-->
            <div class="col-3 col-md-3 p-0">
                <div class="shop-item bg-white">
                    <div class="thumbnail-menu p-0" style="border-radius: 0;">
                        <!-- product image(s) -->

                        <a class="shop-item-image" href="<?=base_url('home/partnership')?>">
                            <img class="img-help" alt="partnership"
                                 src="<?= site_url('asset/icon/Partnership.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/icon/Partnership-hover.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/icon/Partnership.png"); ?>'"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="shop-item-summary p-15">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <p class="text-center fs-20 text-help"><b>PARTNERSHIP</b></p>
                                    <p class="text-center fs-20 hidden-md-down">Lorem ipsum dolor sit amet</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Product Hightlight -->

