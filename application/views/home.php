<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- SLIDER -->
<section id="slider" class="h-600 mobile-fullheight">

    <div class="swiper-container" data-effect="slide" data-autoplay="true">
        <div class="swiper-wrapper">
            <?php
				$i = 0;
				foreach ($slides as $pic) {
                ?>
                <!-- SLIDES -->

                <a class="swiper-slide" href="<?= $pic['bannerlink'] ?>"
                   style="display:inline-block;background-image: url(<?= base_url('asset/upload/'.$pic['slide']); ?>);">
                <?php if ($i == 0) { ?>
						<div class="overlay dark-1"><!-- dark overlay [1 to 9 opacity] -->
							<div class="display-table">

								<div class="display-table-cell" style="vertical-align-middle">
									<div class="container">
										<div class="row">
											<div class="text-center col-md-8 col-xs-12 offset-md-2">
												<div class="fixed-bottom pb-35">
													<a class="btn btn-lg btn-exp scrollTo b-0" href="#product">EXPLORE
														<br>
														<i class="fa fa-chevron-down">
														</i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
              	<?php } ?>
				</a>
                <!--            </div>-->

                <!-- /SLIDE 1 -->
            <?php $i++; } ?>

            <!-- Swiper Arrows -->
        </div>
		<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
		<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
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
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/aireloom'); ?>">
                            <img class="product-img wow fadeInUp" alt="Aireloom" data-wow-delay="0.2s"
                                 src="<?= base_url('asset/brands/Aireloom.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverAireloom.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/Aireloom.png"); ?>'"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/kingkoil'); ?>">
                            <img class="product-img wow fadeInUp" alt="Kingkoil" data-wow-delay="0.2s"
                                 src="<?= base_url('asset/brands/King-koil.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverKing-koil.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/King-koil.png"); ?>'"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/serta'); ?>">
                            <img class="product-img wow fadeInUp" alt="Serta" data-wow-delay="0.2s"
                                 src="<?= base_url('asset/brands/Serta.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverSerta.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/Serta.png"); ?>'"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/tempur'); ?>">
                            <img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Tempur"
                                 src="<?= base_url('asset/brands/Tempur.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverTempur.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/Tempur.png"); ?>'"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/florence'); ?>">
                            <img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Florence"
                                 src="<?= base_url('asset/brands/Florence.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverFlorence.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/Florence.png"); ?>'"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 pb-40">
                        <a href="<?= site_url('home/shop/ogawa'); ?>">
                            <img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Ogawa"
                                 src="<?= base_url('asset/brands/Ogawa.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/brands/hoverOgawa.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/brands/Ogawa.png"); ?>'"/>
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
                <div class="shop-item bg-white wow fadeInUp" data-wow-delay="0.2s">
                    <div class="thumbnail p-0">
                        <!-- product image(s) -->
                        <div class="text-block">
                            <p class="text-center" style="letter-spacing: 3px;"><b>BEST SELLER</b></p>
                        </div>

                        <a class="shop-item-image" href="<?=base_url("home/detailProduct/".$bestSeller[0]["slugs"])?>">
                            <img class="img-fluid" style="position: relative; z-index: auto"
                                 src="<?= site_url('asset/upload/'.$bestSeller[0]["image_1"]); ?>"
                                 alt="product name"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="shop-item-summary p-30">
                            <div class="row mb-5">
                                <div class="col-8 col-md-12 col-lg-8">
                                    <a href="<?=base_url("home/detailProduct/".$bestSeller[0]["slugs"])?>"><h2 class="align-middle"><?=strtoupper($bestSeller[0]["name"])?></h2></a>
                                </div>
                                <div class="col-4 col-md-12 col-lg-4 p-0">
                                    <a class="rating rating-<?=$bestSeller[0]["stars"]?> fs-16" href="<?=base_url("home/detailProduct/".$bestSeller[0]["slugs"]."#review-section")?>">
                                        <!-- rating-0 ... rating-5 -->
                                    </a>
                                </div>
                            </div>
							<div class="row mb-10">
								<div class="col-12 col-md-12 col-lg-12">
									<?=$bestSeller[0]["brand"]?>
								</div>
							</div>
                            <?php if ($bestSeller[0]["sub_price"] != 0) { ?>
                                <small class="text-muted">Was Rp <strike><?= number_format($bestSeller[0]["price"], 2, ",",
                                            "."); ?></strike></small>
                                <!-- price -->
                                <div class="shop-item-price fs-24">
                                    Rp <?= number_format($bestSeller[0]["sub_price"], 0, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } else { ?>
                                <small class="text-muted">&nbsp;</small>
                                <!-- price -->
                                <div class="shop-item-price fs-24">
                                    Rp <?= number_format($bestSeller[0]["price"], 0, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--            #2 Bed Linen-->
            <div class="col-12 col-md-4 pt-30">
                <div class="shop-item bg-white wow fadeInUp" data-wow-delay="0.3s">
                    <div class="thumbnail p-0">
                        <!-- product image(s) -->
                        <div class="text-block">
                            <p class="text-center" style="letter-spacing: 3px;"><b>BED LINEN</b></p>
                        </div>
                        <a class="shop-item-image" href="<?=base_url("home/detailProduct/".$bedLinen[0]["slugs"])?>">
                            <img class="img-fluid" style="position: relative; z-index: auto"
                                 src="<?= site_url('asset/upload/'.$bedLinen[0]["image_1"]); ?>"
                                 alt="product name"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="shop-item-summary p-30">
                            <div class="row mb-5">
                                <div class="col-8 col-md-12 col-lg-8">
									<a href="<?=base_url("home/detailProduct/".$bedLinen[0]["slugs"])?>"><h2 class="align-middle"><?=strtoupper($bedLinen[0]["name"])?></h2></a>
                                </div>
                                <div class="col-4 col-md-12 col-lg-4 p-0">
                                    <a class="rating rating-<?=$bedLinen[0]["stars"]?> fs-16" href="<?=base_url("home/detailProduct/".$bedLinen[0]["slugs"]."#review-section")?>">
                                        <!-- rating-0 ... rating-5 -->
                                    </a>
                                </div>
                            </div>
							<div class="row mb-10">
								<div class="col-12 col-md-12 col-lg-12">
									<?=$bedLinen[0]["brand"]?>
								</div>
							</div>
                            <?php if ($bedLinen[0]["sub_price"] != 0) { ?>
                                <small class="text-muted">Was Rp <strike><?= number_format($bedLinen[0]["price"], 2, ",",
                                            "."); ?></strike></small>
                                <!-- price -->
                                <div class="shop-item-price fs-24">
                                    Rp <?= number_format($bedLinen[0]["sub_price"], 0, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } else { ?>
                                <small class="text-muted">&nbsp;</small>
                                <!-- price -->
                                <div class="shop-item-price fs-24">
                                    Rp <?= number_format($bedLinen[0]["price"], 0, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--            #3 Bedding Accessories-->
            <div class="col-12 col-md-4 pt-30">
                <div class="shop-item bg-white wow fadeInUp" data-wow-delay="0.4s">
                    <div class="thumbnail p-0">
                        <!-- product image(s) -->
                        <div class="text-block">
                            <p class="text-center" style="letter-spacing: 3px;"><b>BEDDING ACCESSORIES</b></p>
                        </div>
                        <a class="shop-item-image" href="<?=base_url("home/detailProduct/".$beddingAcc[0]["slugs"])?>">
                            <img class="img-fluid" style="position: relative; z-index: auto"
                                 src="<?= site_url('asset/upload/'.$beddingAcc[0]["image_1"]); ?>"
                                 alt="product name"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="shop-item-summary p-30">
                            <div class="row mb-5">
                                <div class="col-8 col-md-12 col-lg-8">
									<a href="<?=base_url("home/detailProduct/".$beddingAcc[0]["slugs"])?>"><h2 class="align-middle"><?=strtoupper($beddingAcc[0]["name"])?></h2></a>
                                </div>
                                <div class="col-4 col-md-12 col-lg-4 p-0">
									<a class="rating rating-<?=$beddingAcc[0]["stars"]?>" href="<?=base_url("home/detailProduct/".$beddingAcc[0]["slugs"]."#review-section")?>">
										<!-- rating-0 ... rating-5 -->
									</a>
                                </div>
                            </div>
							<div class="row mb-10">
								<div class="col-12 col-md-12 col-lg-12">
									<?=$beddingAcc[0]["brand"]?>
								</div>
							</div>
                            <?php if ($beddingAcc[0]["sub_price"] != 0) { ?>
                                <small class="text-muted">Was Rp <strike><?= number_format($beddingAcc[0]["price"], 2, ",",
                                            "."); ?></strike></small>
                                <!-- price -->
                                <div class="shop-item-price fs-24">
                                    Rp <?= number_format($beddingAcc[0]["sub_price"], 0, ",", "."); ?>
                                </div>
                                <!-- /price -->
                            <?php } else { ?>
                                <small class="text-muted">&nbsp;</small>
                                <!-- price -->
                                <div class="shop-item-price fs-24">
                                    Rp <?= number_format($beddingAcc[0]["price"], 0, ",", "."); ?>
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
            <img class="pedia-img-1" src="<?= site_url('asset/upload/special-package/cover/'.$spPackage['slide']); ?>"
                 alt="agmpedia">
            <div class="absolute justify-content-around pl-20 pb-20 text-left bg-gradient-red">
                <div class="ml-50 mt-150">
                    <h1 class="text-white mb-0">ONLINE<br>PROMOTION</h1>
                    <a class="btn btn-outline-white mt-10" href="<?= base_url('home/special_package'); ?>">Discover more</a>
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
                <h3 class="text-center" style="letter-spacing: 3px;">PRODUCT HIGHLIGHT</h3>
            </div>
        </div>
        <div class="row">

            <?php
            foreach ($product_highlight as $p):
                ?>
                <div class="col-12 col-md-3 pt-30">
                    <div class="shop-item bg-white wow fadeInUp" data-wow-delay="0.2s">
                        <div class="thumbnail-highlight">
                            <!-- product image(s) -->

                            <a class="shop-item-image" href="<?=base_url("home/detailProduct/".$p["slugs"])?>">
                                <img class="img-fluid" style="position: relative; z-index: auto"
                                     src="<?= site_url('asset/upload/'.$p["image_1"]); ?>"
                                     alt="product name"/>
                            </a>
                            <!-- /product image(s) -->

                            <div class="shop-item-summary p-15">
                                <div class="row mb-5">
                                    <div class="col-12">
										<a href="<?=base_url("home/detailProduct/".$p["slugs"])?>"><h2 class="align-middle"><?=strtoupper($p["name"])?></h2></a>
                                    </div>
                                </div>
								<div class="row mb-10">
									<div class="col-12 col-md-12 col-lg-12">
										<?=$p["brand"]?>
									</div>
								</div>
                                <?php if ($p["sub_price"] != 0) { ?>
                                    <small class="text-muted">Was Rp <strike><?= number_format($p["price"], 2, ",",
                                                "."); ?></strike></small>
                                    <!-- price -->
                                    <div class="shop-item-price fs-24">
                                        Rp <?= number_format($p["sub_price"], 0, ",", "."); ?>
                                    </div>
                                    <!-- /price -->
                                <?php } else { ?>
                                    <small class="text-muted">&nbsp;</small>
                                    <!-- price -->
                                    <div class="shop-item-price fs-24">
                                        Rp <?= number_format($p["price"], 0, ",", "."); ?>
                                    </div>
                                    <!-- /price -->
                                <?php } ?>
                                <a class="mt-15 rating rating-<?=$p["stars"]?>" href="<?=base_url("home/detailProduct/".$p["slugs"]."#review-section")?>" style="letter-spacing: 1px;">
                                    <!-- rating-0 ... rating-5 -->
                                </a>
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
                <div class="shop-item bg-white wow fadeInUp" data-wow-delay="0.2s">
                    <div class="thumbnail-menu p-0" style="border: 0px; border-radius: 0px !important;">
                        <a class="shop-item-image" href="<?=base_url('home/store-location')?>">
                            <img class="img-help" alt="stores"
                                 src="<?= site_url('asset/icon/Stores.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/icon/Stores-hover.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/icon/Stores.png"); ?>'"/>
                        </a>

                        <div class="p-15">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <p class="text-center fs-20 text-help"><b>STORES</b></p>
                                    <p class="text-center fs-15 hidden-md-down">Find our nearest stores in your city</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--            # 2 Support-->
            <div class="col-3 col-md-3 p-0">
                <div class="shop-item bg-white wow fadeInUp" data-wow-delay="0.2s">
                    <div class="thumbnail-menu p-0" style="border-radius: 0;">

                        <a class="shop-item-image" href="<?=base_url('home/pageContact')?>">
                            <img class="img-help" alt="support"
                                 src="<?= site_url('asset/icon/Support.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/icon/Support-hover.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/icon/Support.png"); ?>'"/>
                        </a>

                        <div class="p-15">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <p class="text-center fs-20 text-help"><b>SUPPORT</b></p>
                                    <p class="text-center fs-15 hidden-md-down">We will try to answer all of your questions. Let us help and serve you better.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--            # 3 AGM Pedia-->
            <div class="col-3 col-md-3 p-0">
                <div class="shop-item bg-white wow fadeInUp" data-wow-delay="0.4s">
                    <div class="thumbnail-menu p-0" style="border-radius: 0;">
                        <!-- product image(s) -->

                        <a class="shop-item-image" href="<?=base_url('home/listArticle')?>">
                            <img class="img-help" alt="agmpedia"
                                 src="<?= site_url('asset/icon/AGMPedia.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/icon/AGMPedia-hover.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/icon/AGMPedia.png"); ?>'"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="p-15">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <p class="text-center fs-20 text-help"><b>AGM PEDIA</b></p>
                                    <p class="text-center fs-15 hidden-md-down">Everything you need to know about AGM, good mattress, and good sleep.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--            # 4 Partnership-->
            <div class="col-3 col-md-3 p-0">
                <div class="shop-item bg-white wow fadeInUp" data-wow-delay="0.4s">
                    <div class="thumbnail-menu p-0" style="border-radius: 0;">
                        <!-- product image(s) -->

                        <a class="shop-item-image" href="<?=base_url('home/partnership')?>">
                            <img class="img-help" alt="partnership"
                                 src="<?= site_url('asset/icon/Partnership.png'); ?>"
                                 onmouseover="this.src='<?= base_url("asset/icon/Partnership-hover.png"); ?>'"
                                 onmouseout="this.src='<?= base_url("asset/icon/Partnership.png"); ?>'"/>
                        </a>
                        <!-- /product image(s) -->

                        <div class="p-15">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <p class="text-center fs-20 text-help"><b>PARTNERSHIP</b></p>
                                    <p class="text-center fs-15 hidden-md-down">Find your business opportunity, and become part of the AGM extended family </p>
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
