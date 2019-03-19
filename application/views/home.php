<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

		<!-- SLIDER -->
		<section id="slider" class="fullheight mobile-fullheight">

			<div class="swiper-container" data-effect="slide" data-autoplay="false">
				<div class="swiper-wrapper">

					<!-- SLIDE 1 -->
					<div class="swiper-slide" style="background-image: url(<?= base_url('asset/upload/'.$slides[0]['slide']);?>);">
						<div class="overlay dark-5">
							<!-- dark overlay [1 to 9 opacity] -->
						</div>

						<div class="display-table">
							<div class="display-table-cell vertical-align-middle">
								<div class="container">
									<div class="row">
										<div class="text-center col-md-8 col-xs-12 offset-md-2">
											<div class="fixed-bottom pb-35">
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
					<div class="col-6 col-md-4 col-lg-2 offset-lg-3 pb-70">
						<a href="<?= site_url('home/shop/1/1');?>">
							<img class="product-img wow fadeInUp" alt="Aireloom" data-wow-delay="0.2s" src="<?= base_url('');?>asset/brands/Aireloom.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-2 pb-70">
						<a href="<?= site_url('home/shop/2/1');?>">
							<img class="product-img wow fadeInUp" alt="Kingkoil" data-wow-delay="0.2s" src="<?= base_url('');?>asset/brands/KingKoil.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-2 pb-70">
						<a href="<?= site_url('home/shop/4/1');?>">
							<img class="product-img wow fadeInUp" alt="Serta" data-wow-delay="0.2s" src="<?= base_url('');?>asset/brands/Serta.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-2 offset-lg-3 pb-70">
						<a href="<?= site_url('home/shop/5/1');?>">
							<img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Tempur" src="<?= base_url('');?>asset/brands/Tempur.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-2 pb-70">
						<a href="<?= site_url('home/shop/3/1');?>">
							<img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Florence" src="<?= base_url('');?>asset/brands/Florence.png" />
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-2 pb-70">
						<a href="<?= site_url('home/shop/6/1');?>">
							<img class="product-img wow fadeInUp" data-wow-delay="0.4s" alt="Stressless" src="<?= base_url('');?>asset/brands/Stressless.png" />
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-12 text-center">
						<button class="brand-button wow fadeInUp" data-wow-delay="0.6s">
							N E W S L E T T E R
						</button>
						<a class="wow fadeInUp" data-wow-delay="0.6s" href="<?= site_url('home/partnership')?>">
							<p>View Detail &nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
						</a>

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
						<img class="promotion-image-1" src="<?= base_url('');?>asset/content-images/slider-1-100x100.png" alt="agm best seller" />
						<div class="absolute pl-20 pb-20 bottom-center text-left">
							<h2 class="hidden-md-down text-white">BEST<br>SELLER</h2>
							<a class="mt-10" href="<?= base_url('home/bestSeller');?>">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
						</div>
					</div>

					<div class="col-12 col-md-8">
						<div class="row">
							<div class="col-md-12 pt-30">
								<div class="relative">
									<img class="promotion-image-2" src="<?= base_url('');?>asset/content-images/slider-1-100x100.png" alt="agm gallery" />
									<div class="absolute pl-20 pb-20 bottom-center text-left">
										<h2 class="hidden-md-down text-white">SPECIAL<br>PACKAGES</h2>
										<a href="<?= base_url('home/promotionPage');?>">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-6 pt-30">
								<img class="promotion-image-3" src="<?= base_url('');?>asset/content-images/slider-1-100x100.png" alt="agm lastest collectin" />
								<div class="absolute pl-20 pb-20 bottom-center text-left">
									<h2 class="hidden-md-down text-white">BED<br>LINEN</h2>
									<a href="<?= base_url('home/bed_linen');?>">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
								</div>
							</div>
							<div class="col-md-6 pt-30">
								<img class="promotion-image-3" src="<?= base_url('');?>asset/content-images/slider-1-100x100.png" alt="agm lastest collectin" />
								<div class="absolute pl-20 pb-20 bottom-center text-left">
									<h2 class="hidden-md-down text-white">BEDDING<br>ACCESSORIES</h2>
									<a href="<?= base_url('home/bedding_Acc');?>">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
								</div>
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
  <div class="row">
    <div class="col-12 col-md-7 order-2 order-md-1">
      <img class="pedia-img-1" src="<?= base_url('asset/content-images/slider-1-100x100.png');?>" alt="agmpedia">
    </div>
    <div class="col-12 col-md-5 pb-30 order-1 order-md-2">
      <div class="buttons-autohide controlls-over mb-30" data-plugin-options='{"singleItem": true, "navigation": false, "autoPlay": 3000, "pagination": false, "transitionStyle":"fade"}'>
        <div>
          <img class="pedia-img-2" src="<?= base_url('asset/content-images/slider-1.jpg');?>" style="width:100%;" alt="agmpedia title">
          <div class="absolute pt-20">
            <h4 class="text-white text-center">LOREM</h4>
            <h6 class="text-white text-center">CONSECTUR ADIPISCING ELIT 1</h6>
            <p class="fs-10 text-white text-justify pedia-text hidden-xs-down hidden-md-down just-hidden">

            </p>
            <p class="text-center to-center fs-12 pt-20"><a class="text-white" href="<?= site_url('home/fullArticle');?>">read more<i class="fa fa-chevron-right pl-5"
                 aria-hidden="true"></i></a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-5 pb-5">
      <?php foreach ($pedias as $pedia): ?>
      <div class="buttons-autohide controlls-over mb-30" data-plugin-options='{"singleItem": true, "navigation": false, "autoPlay": 3000, "pagination": false, "transitionStyle":"fade"}'>
        <div>
            <img class="pedia-img-2" src="<?= base_url('asset/upload/pedia/'.$pedia['photo']);?>" style="width:100%;" alt="agmpedia title">
            <div class="absolute pt-20">
              <h4 class="text-white text-center"><?= $pedia['title'];?></h4>
              <p class="fs-10 text-white text-justify pedia-text hidden-xs-down hidden-md-down just-hidden">
                <?= $pedia['sub_content'];?>
              </p>
              <p class="text-center to-center fs-12 pt-20"><a class="text-white" href="<?= site_url('home/fullArticle/'.$pedia['id']);?>">read more<i class="fa fa-chevron-right pl-5"
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
  <?php endforeach; ?>
  </div>
</section>
<!-- /AGMPEDIA -->

<hr>

<!-- LOCATION -->
<section id="location" class="mb-30">
	<div class="container-fluid">
	<h3 class="text-center mb-30">OUR LOCATION</h3>
		<div class="location-form">
			<div class="row location-form-small float-right">
				<div class="col-12 location-form-small">
					<div class="modal-dialog w-350 mr-60 absolute" style="z-index:1;">
						<div class="modal-content">
							<div class="modal-header">
								<p>
								Cari Lokasi Agen
								</p>
								<div class="input-group mt-0">
									<div class="input-group-addon">
									<i class="fa fa-search"></i>
									</div>
									<input id="filter-store" type="text" class="form-control" placeholder="Search">
								</div>
							<div class="modal-body px-0">
								<div id="store" class="list-group margin-bottom-0 list-height">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  		<div class="row">
			<div class="col-12 pb-30">
				<div class="form-group h-500">
					<div class="absolute" id="maps" >
						<input type="hidden" id="lat" />
						<input type="hidden" id="lng" />
					</div>
			</div>
		</div>
	</div>
</section>
<!-- /LOCATION -->
