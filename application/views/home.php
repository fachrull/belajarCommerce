<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

		<!-- SLIDER -->
		<section id="slider" class="fullheight mobile-fullheight">

			<div class="swiper-container" data-effect="slide" data-autoplay="false">
				<div class="swiper-wrapper">

					<!-- SLIDE 1 -->
					<div class="swiper-slide" style="background-image: url(<?= base_url('asset/upload/'.$slides[0]['slide']);?>);">
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
<section id="product" class="section-lg">
			<div class="container">
				<div class="row text-center">
				<div class="col-lg-8 offset-lg-2">
				<div class="row text-center">
				<div class="col-6 col-md-4 col-lg-4 pb-70">
						<a href="<?= site_url('home/shop/1');?>">
							<img class="product-img wow fadeInUp" alt="Aireloom" data-wow-delay="0.2s" src="<?= base_url('');?>asset/brands/Aireloom.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-4 pb-70">
						<a href="<?= site_url('home/shop/2');?>">
							<img class="product-img wow fadeInUp" alt="Kingkoil" data-wow-delay="0.2s" src="<?= base_url('');?>asset/brands/KingKoil.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-4 pb-70">
						<a href="<?= site_url('home/shop/4');?>">
							<img class="product-img wow fadeInUp" alt="Serta" data-wow-delay="0.2s" src="<?= base_url('');?>asset/brands/Serta.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-4 pb-70">
						<a href="<?= site_url('home/shop/5/1');?>">
							<img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Tempur" src="<?= base_url('');?>asset/brands/Tempur.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-4 pb-70">
						<a href="<?= site_url('home/shop/3');?>">
							<img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Florence" src="<?= base_url('');?>asset/brands/Florence.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-4 pb-70">
						<a href="<?= site_url('home/shop/6');?>">
							<img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Stressless" src="<?= base_url('');?>asset/brands/Stressless.png" />
						</a>
					</div>
				</div>
				</div>

				</div>
			</div>
		</section>
<!-- /PRODUCT -->

<hr>

<!-- PROMOTION -->
<section id="promotion">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-4 pt-30">
						<a class="mt-10" href="<?= base_url('home/bestSeller');?>">
						<img class="promotion-image-1" src="<?= base_url('asset/upload/best-seller-cover/'.$best_seller['slide']);?>" alt="agm best seller" />
						<div class="absolute pl-20 pb-20 bottom-center text-left">
							<h2 class="text-grey">BEST<br>SELLER</h2>
							<a class="text-grey mt-10" href="<?= base_url('home/bestSeller');?>">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
						</div>
						</a>
					</div>

					<div class="col-12 col-md-8">
						<div class="row">
							<div class="col-md-12 pt-30">
								<a href="<?= base_url('home/specialPackage');?>">
								<div class="relative">
									<img class="promotion-image-2" src="<?= base_url('asset/upload/special-package/cover/'.$spPackage['slide']);?>" alt="agm gallery" />
									<div class="absolute pl-20 pb-20 bottom-center text-left">
										<h2 class="text-grey">SPECIAL<br>PACKAGES</h2>
										<a class="text-grey" href="<?= base_url('home/specialPackage');?>">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
									</div>
								</a>
								</div>
							</div>
							<div class="col-md-6 pt-30">
								<a href="<?= base_url('home/bed_linen');?>">
								<img class="promotion-image-3" src="<?= base_url('asset/upload/bed-linen-cover/'.$bedLinen['slide']);?>" alt="agm lastest collectin" />
								<div class="absolute pl-20 pb-20 bottom-center text-left">
									<h2 class="text-grey">BED<br>LINEN</h2>
									<a class="text-grey" href="<?= base_url('home/bed_linen');?>">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
								</div>
								</a>
							</div>
							<div class="col-md-6 pt-30">
								<a href="<?= base_url('home/bedding_acc');?>">
								<img class="promotion-image-3" src="<?= base_url('asset/upload/bedding-acc-cover/'.$beddingAcc['slide']);?>" alt="agm lastest collectin" />
								<div class="absolute pl-20 pb-20 bottom-center text-left">
									<h2 class="text-grey">BEDDING<br>ACCESSORIES</h2>
									<a class="text-grey" href="<?= base_url('home/bedding_acc');?>">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
								</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<!-- /PROMOTION -->

<hr>

<!-- AGMPEDIA -->
<section id="agmpedia" class="section-xs container">
  <a href="list-article.html">
    <h3 class="text-center">AGMPEDIA</h3>
    <h5 class="text-center">lastest news of week</h5>
  </a>
    <?php
    $i = 1;
    foreach ($pedias as $pedia):
        if ($i % 2 == 1) {?>
            <div class="row">
                <div class="col-12 col-md-5 pb-5">
                    <div class="buttons-autohide controlls-over mb-30" data-plugin-options='{"singleItem": true, "navigation": false, "autoPlay": 3000, "pagination": false, "transitionStyle":"fade"}'>
                        <div>
                            <img class="pedia-img-1" src="<?= base_url('asset/content-images/slider-1.jpg');?>" style="width:100%;" alt="agmpedia title">
                            <div class="absolute pt-30">
                                <h4 class="text-white text-center mb-20"><?= $pedia['title'];?></h4>
                                <p class="fs-13 text-white text-justify pedia-text hidden-xs-down hidden-md-down just-hidden">
                                    <?= $pedia['sub_content'];?>
                                </p>
                                <p class="text-center to-center fs-13 pt-10">
                                    <a class="text-white block" href="<?= site_url('home/fullArticle/'.$pedia['id']);?>">read more<i class="fa fa-chevron-right pl-5"
                                                                                                                                     aria-hidden="true"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 pb-5">
                    <div class="buttons-autohide controlls-over mb-30" data-plugin-options='{"singleItem": true, "navigation": false, "autoPlay": 3000, "pagination": false, "transitionStyle":"fade"}'>
                        <img class="pedia-img-1" src="<?= base_url('asset/upload/pedia/'.$pedia['thumbnail']);?>" alt="agmpedia">
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-12 col-md-7 order-2 order-md-1">
                    <img class="pedia-img-1" src="<?= base_url('asset/upload/pedia/'.$pedia['thumbnail']);?>" alt="agmpedia">
                </div>
                <div class="col-12 col-md-5 pb-30 order-1 order-md-2">
                    <div class="buttons-autohide controlls-over mb-30" data-plugin-options='{"singleItem": true, "navigation": false, "autoPlay": 3000, "pagination": false, "transitionStyle":"fade"}'>
                        <div>
                            <img class="pedia-img-1" src="<?= base_url('asset/content-images/slider-1.jpg');?>" style="width:100%;" alt="agmpedia title">
                            <div class="absolute pt-20">
                                <h4 class="text-white text-center mb-20"><?= $pedia['title'];?></h4>
                                <p class="fs-13 text-white text-justify pedia-text hidden-xs-down hidden-md-down just-hidden">
                                    <?= $pedia['sub_content'];?>
                                </p>
                                <p class="text-center to-center fs-13 pt-10">
                                    <a class="text-white" href="<?= site_url('home/fullArticle/'.$pedia['id']);?>">read more<i class="fa fa-chevron-right pl-5"
                                                                                                                               aria-hidden="true"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        $i++;
    endforeach;?>
</section>
<!-- /AGMPEDIA -->

<hr>

<!-- LOCATION -->
<section id="location" class="mb-30">
	<div class="container-fluid">
		<h3 class="text-center mb-30">OUR LOCATION</h3>
		<div id="store-location"></div>
	</div>
</section>
<!-- /LOCATION -->

<!-- Large Modal >-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- header modal -->
			<div class="modal-header">
				<h4 class="modal-title float-left" id="mySmallModalLabel">Stay In The Know</h4>
				<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>

			<!-- body modal -->
			<div class="modal-body">
			<h6>Be the first to hear about new inventory and offers.</h6>
				<div class="input-email pb-0 mb-0" style="width:265px !important;">
					<input type="text" class="form-control form-control-footer" placeholder="Your Mail" aria-label="Your Mail"
					 aria-describedby="basic-addon2" style="width:265px !important;">
				</div>
				<button class="btn-sm float-right mt-10">SUBMIT <i class="fa fa-chevron-right"></i></button>
			</div>

		</div>
	</div>
</div>
<!-- /Large Modal -->
