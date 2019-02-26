<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-md">
	<div class="container">
		<h1><?= $product['name'];?></h1>

		<!-- breadcrumbs -->
		<!--<ol class="breadcrumb">-->
		<!--	<li><a href="<?= site_url('#home');?>">Home</a></li>-->
		<!--	<li><a href="<?= site_url('home/shop');?>">Shop</a></li>-->
		<!--	<li class="active">Detail Product</li>-->
		<!--</ol>-->
		<!-- /breadcrumbs -->

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

					<ul id="categories" class="list-group list-group-bordered list-group-icon uppercase">
								<li class="list-group-noicon active">
									<a href="#">MATTRESS</a>
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
						<li class="list-group-item"><a href="#"> Aireloom</a></li>
						<li class="list-group-item"><a href="#"> KingKoil</a></li>
						<li class="list-group-item"><a href="#"> Serta</a></li>
						<li class="list-group-item"><a href="#"> Tempur</a></li>
						<li class="list-group-item"><a href="#"> Stressless</a></li>
						<li class="list-group-item"><a href="#"> Florence</a></li>
					</ul>

				</div>
				<!-- BRANDS -->

				<!-- BANNER ROTATOR -->
                <div class="owl-carousel buttons-autohide controlls-over mb-60 text-center" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": true, "pagination": false, "transitionStyle":"goDown"}'>
							<div class="banner-rotator">
							<img class="img-fluid" src="<?= site_url('asset/content-images/slider-1-100x100.png');?>" width="270" height="350" alt="an offer's voucher">
							<div class="absolute mt-120">
								<a href="<?= base_url('home/bestSeller');?>">
								<p>Best Seller 1</p>
								</a>
								</div>
							<div class="absolute position-bottom">
								<a href="<?= base_url('home/bestSeller');?>">
								<p>View Detail</p>
								</a>
								</div>
							</div>
							<div class="banner-rotator">
							<img class="img-fluid" src="<?= site_url('asset/content-images/slider-1-100x100.png');?>" width="270" height="350" alt="an offer's voucher">
							<div class="absolute mt-120">
								<a href="<?= base_url('home/bestSeller');?>">
								<p>Best Seller 2</p>
								</a>
								</div>
							<div class="absolute position-bottom">
								<a href="<?= base_url('home/bestSeller');?>">
								<p>View Detail</p>
								</a>
								</div>
							</div>
						</div>
					<!-- /BANNER ROTATOR -->

			</div>


			<!-- RIGHT -->
			<div class="col-lg-9 col-md-9 col-sm-9 order-md-2 order-lg-2">

				<div class="row">

					<!-- IMAGE -->
					<div class="col-lg-6 col-sm-6">

						<div class="thumbnail relative mb-3">
							<figure id="zoom-primary" class="zoom" data-mode="mouseover">
								<a class="lightbox bottom-right" href="<?= site_url('asset/upload/'.$product['image']);?>" data-plugin-options='{"type":"image"}'><i
									 class="glyphicon glyphicon-search"></i></a>
								<img class="img-fluid" src="<?= site_url('asset/upload/'.$product['image']);?>" alt="This is the product title" />
							</figure>

						</div>

						<div class="tabbed hidden-lg-down text-center">
                                <?php foreach($specs as $spec):?>
									<a href="1" id="1">
										<img class="thumbnail-specs" src="<?= base_url('');?>asset/logo-specs/5-zone-pocket-spring.png.pagespeed.ce.MDUzM1LUYu.png" alt="">
										<div class="text-center">
											<h3><?= $spec['name'];?></h3>
										</div>
									</a>
								<?php endforeach;?>
								</div>

					</div>
					<!-- /IMAGE -->

					<!-- ITEM DESC -->
					<div class="col-lg-6 col-sm-6">

						<div class="shop-item-price mt-0">
							<span class="pl-0 bold fs-24 mt-0"><strong><?= $product['name'];?></strong></span>
							<!-- rating -->
						<div class="rating rating-4 fs-17 mt-10 fw-100 float-right">
							<!-- rating-0 ... rating-5 -->
						</div>
						<!-- /rating -->
						</div>

						<div class="mb-15 pl-0">
							<p class="text-left fs-18 bold" id="price2">
							Rp. <span class="minprice"><?= $product['min_price'];?></span>
							-
							Rp. <span class="maxprice"><?= $product['max_price'];?></span>
							</p>
						</div>

						<hr />

						<!-- short description -->
						<p class="mt-10"><?= $product['description'];?></p>
						<!-- /short description -->

						<hr />

						<div class="toggle">
									<label>Checking the stocks</label>

									<div class="toggle-content">
										<div class="clearfix mb-30">
											<span id="stockDetail" class="float-right text-oldblue"><i id="stockIcon" class="fa fa-check"></i> In Stock</span>
											<!--
												<span class="float-right text-danger"><i class="fa fa-remove"></i> Out of Stock</span>
												-->

											<strong id="stockTitle">Choose your location first</strong>
										</div>

										<div id="pageloader">
											<img src="<?= base_url('asset/content-images/4.gif');?>" alt="">
										</div>

										<form action="#" method="post" class="m-0">
											<label>Province</label>
											<select id="province" name="province" class="form-control pointer mb-20">
												<option value="Select" selected disabled> Select </option>
												<?php foreach ($provinces as $province): ?>
													<option value="<?= $province['id_prov']?>"><?= $province['nama']?></option>
												<?php endforeach; ?>
												<!-- add all here -->
											</select>

											<label>City</label>
											<select id="city" name="city" class="form-control pointer mb-20">
												<option value="Select" selected disabled> Select </option>
												<!-- add all here-->
											</select>

											<label>District</label>
											<select id="sub_district" name="cart-tax-state" class="form-control pointer mb-20">
												<option value="Select" selected disabled> Select </option>
												<!-- add all here -->
											</select>

										</form>
									</div>

								</div>

						<!-- FORM -->
						<div id="shoppingForm" class="row text-center">
							<form class="clearfix form-inline m-0" method="post" action="<?= site_url('home/addToCart');?>">
								<input type="hidden" id="product_id" name="product_id" value="<?= $product['id'];?>" />
								<input type="hidden" name="product_name" value="<?= $product['name'];?>" />
								<input type="hidden" id="price" name="price" />
								<input type="hidden" id="size-name" name="size-name" />

								<!-- <div class="col-2 col-md-2 mb-8">&nbsp;Price:</div> -->
								<!-- <div class="col-2 col-md-10 mb-10"><p class="text-left" id="price2"></p></div> -->
								<div class="col-2 col-md-2 mb-10">Size:</div>
								<div class="col-4 col-md-10 mb-10">
									<div>
										<select class="form-control" name="size" id="size" style="width:100% !important;">
											<option value="" selected disabled>Size</option>
										</select>
									</div>
								</div>
								<div class="col-2 col-md-2 mb-10">Qty:</div>
								<div class="col-4 col-md-10 mb-10">
									<div>
										<input name="qty" type="text" value="1" min="0" max="1000" class="form-control stepper" style="width:100% !important;">
									</div><!-- /btn-group -->
								</div>
                                <div class="col-4 col-md-12 float-right">
								    <button type="submit" class="btn align-middle btn-oldblue float-right product-add-cart h-45 rad-0 p-0 w-130">ADD TO CART</button>
								</div>

							</form>

								</div>
							<!-- /FORM -->

							<hr>



					</div>
					<!-- /ITEM DESC -->

				</div>



				<ul id="myTab" class="nav nav-tabs nav-top-border mt-80" role="tablist">
					<li class="nav-item"><a class="nav-links active" href="#reviews" data-toggle="tab">Reviews (2)</a></li>
				</ul>

				<div class="tab-content pt-20">


					<!-- REVIEWS -->
					<div role="tabpanel" id="reviews">
								<!-- REVIEW ITEM -->
								<div class="block mb-60">

									<span class="user-avatar">
										<!-- user-avatar -->
										<img class="float-left media-object" src="<?= base_url('');?>asset/another-images/avatar2.jpg" width="64" height="64" alt="username's avatar">
									</span>

									<div class="media-body">
										<h4 class="media-heading fs-14">
											John Doe &ndash;
											<span class="text-muted">June 29, 2014 - 11:23</span> &ndash;
											<span class="fs-14 text-muted">
												<!-- stars -->
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span>
										</h4>

										<p>
											Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta
											dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
											adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque.
										</p>

									</div>

								</div>
								<!-- /REVIEW ITEM -->

								<!-- REVIEW ITEM -->
								<div class="block mb-60">

									<span class="user-avatar">
										<!-- user-avatar -->
										<img class="float-left media-object" src="<?= base_url('');?>asset/another-images/avatar2.jpg" width="64" height="64" alt="username's avatar">
									</span>

									<div class="media-body">
										<h4 class="media-heading fs-14">
											John Doe &ndash;
											<span class="text-muted">June 29, 2014 - 11:23</span> &ndash;
											<span class="fs-14 text-muted">
												<!-- stars -->
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</span>
										</h4>

										<p>
											Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta
											dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
											adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque.
										</p>

									</div>

								</div>
								<!-- /REVIEW ITEM -->


								<!-- REVIEW FORM -->
								<h4 class="page-header mb-40">ADD A REVIEW</h4>
								<form method="post" action="#" id="form">

									<div class="row mb-10">

										<div class="col-md-6 mb-10">
											<!-- Name -->
											<input type="text" name="name" id="name" class="form-control" placeholder="Name *" maxlength="100" required="">
										</div>

										<div class="col-md-6">
											<!-- Email -->
											<input type="email" name="email" id="email" class="form-control" placeholder="Email *" maxlength="100"
											 required="">
										</div>

									</div>

									<!-- Comment -->
									<div class="mb-30">
										<textarea name="text" id="text" class="form-control" rows="6" placeholder="Comment" maxlength="1000"></textarea>
									</div>

									<!-- Stars -->
									<div class="product-star-vote clearfix">

										<label class="radio float-left">
											<input type="radio" name="product-review-vote" value="1" />
											<i></i> 1 Star
										</label>

										<label class="radio float-left">
											<input type="radio" name="product-review-vote" value="2" />
											<i></i> 2 Stars
										</label>

										<label class="radio float-left">
											<input type="radio" name="product-review-vote" value="3" />
											<i></i> 3 Stars
										</label>

										<label class="radio float-left">
											<input type="radio" name="product-review-vote" value="4" />
											<i></i> 4 Stars
										</label>

										<label class="radio float-left">
											<input type="radio" name="product-review-vote" value="5" />
											<i></i> 5 Stars
										</label>

									</div>

									<!-- Send Button -->
									<button type="submit" class="btn btn-oldblue"><i class="fa fa-check"></i> Send Review</button>

								</form>
								<!-- /REVIEW FORM -->

							</div>
				</div>


			</div>


		</div>

	</div>
</section>
<!-- / -->
