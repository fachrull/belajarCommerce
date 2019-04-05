<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-md">
	<div class="container">
		<h1 class="text-uppercase">Dummy</h1>

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

<section class="pt-0">
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
                            <a class="pt-4 pb-4" href="#">Dummy</a>
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
                        <li class="list-group-item"><a href="<?= site_url('home/shop/1');?>">Aireloom</a></li>
                        <li class="list-group-item"><a href="<?= site_url('home/shop/2');?>">Kingkoil</a></li>
                        <li class="list-group-item"><a href="<?= site_url('home/shop/4');?>">Serta</a></li>
                        <li class="list-group-item"><a href="<?= site_url('home/shop/5');?>">Tempur</a></li>
                        <li class="list-group-item"><a href="<?= site_url('home/shop/3');?>">Florence</a></li>
                        <li class="list-group-item"><a href="<?= site_url('home/shop/6');?>">Stressless</a></li>
                    </ul>

				</div>
				<!-- BRANDS -->

				<!-- BANNER ROTATOR MD -->
                <div class="hidden-sm-down  owl-carousel buttons-autohide controlls-over mb-60 text-center" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": true, "pagination": false, "transitionStyle":"goDown"}'>
							<div class="banner-rotator">
							<img class="img-fluid" src="<?= site_url('asset/content-images/slider-1-100x100.png');?>" width="270" height="350" alt="an offer's voucher">
							<div class="absolute" style="top:45%;">
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
							<div class="absolute" style="top:45%;">
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

                <!-- SPECIAL PACKAGE IMAGE -->
                <img src="<?= base_url('asset/upload/4.jpg');?>" alt="" class="special-package-cover">

					<!-- IMAGE -->
					<div class="col-lg-6 col-sm-6">

					<table class="table table-bordered text-center">
                                    <tbody class="text-center">
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>Spine-X</td>
                                        <td>King (193 cm x 203 cm)</td>
                                        <td>10.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Imperial Heritage</td>
                                        <td>King (193 cm x 203 cm)</td>
                                        <td>30.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Imperial Heritage</td>
                                        <td>King (193 cm x 203 cm)</td>
                                        <td>40.000.000</td>
                                    </tr>
                                    </tbody>
                                </table>

					</div>
					<!-- /IMAGE -->

					<!-- ITEM DESC -->
					<div class="col-lg-6 col-sm-6">

						<div class="shop-item-price mt-0">
							<span class="pl-0 bold fs-24 mt-0"><strong>Dummy</strong></span>
							<!-- rating -->
						<div class="rating fs-17 mt-10 fw-100 float-right">
							<!-- rating-0 ... rating-5 -->
						</div>
						<!-- /rating -->
						</div>

						<div class="mb-15 pl-0">
							<p class="text-left fs-18 bold" id="price2">
							Rp. <span ><?=number_format(floatval(100000), 0, ',', '.')?></span>
							-
							Rp. <span><?=number_format(floatval(200000), 0, ',', '.')?></span>
							</p>

						</div>

						<hr />

						<!-- short description -->
						<p class="mt-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate odit quidem suscipit, voluptatum tempore libero impedit animi in explicabo expedita placeat mollitia pariatur doloremque veritatis veniam dolor! Possimus nemo culpa dignissimos doloremque, corporis aperiam molestias maxime nulla ad excepturi maiores impedit iure a architecto quod, fugit quisquam. Ullam, provident quisquam!</p>
						<!-- /short description -->

						<hr />

						<div class="toggle">
									<label  id="stockLabel">Checking the stocks</label>

									<div class="toggle-content">
										<div class="clearfix mb-30">
											<span id="stockDetail" class="float-right text-oldblue"><i id="stockIcon" class="fa fa-check"></i> In Stock</span>
											<!--
												<span class="float-right text-danger"><i class="fa fa-remove"></i> Out of Stock</span>
												-->

											<strong id="stockTitle">Pilih Lokasi Pengiriman</strong>
										</div>

										<div id="pageloader">
											<img src="<?= base_url('asset/content-images/4.gif');?>" alt="">
										</div>

										<form action="#" method="post" class="m-0">
											<label>Province</label>
											<select id="province" name="province" class="form-control pointer mb-20">
												<option value="Select" selected disabled> Select </option>
													<option value="">Dummy</option>
												<!-- add all here -->
											</select>

											<label>City</label>
											<select id="city" name="city" class="form-control pointer mb-20">
												<option value="Select" selected disabled> Select </option>
												<!-- add all here-->
											</select>

											<label>District</label>
											<select id="sub_district" name="sub_district" class="form-control pointer mb-20">
												<option value="Select" selected disabled> Select </option>
												<!-- add all here -->
											</select>

										</form>
									</div>

								</div>

						<!-- FORM -->
						<div id="shoppingForm" class="row text-center">
							<form id="cart_form" class="clearfix form-inline m-0" method="post" action="<?= site_url('home/addToCart');?>">
								<input type="hidden" id="product_id" name="product_id" value="" />
								<input type="hidden" name="product_name" value="" />
								<input type="hidden" id="price" name="price" />

								<!-- <div class="col-2 col-md-2 mb-8">&nbsp;Price:</div> -->
								<!-- <div class="col-2 col-md-10 mb-10"><p class="text-left" id="price2"></p></div> -->
								<div class="col-2 col-md-2 mb-10">Qty:</div>
								<div class="col-4 col-md-10 mb-10">
									<div>
										<input id="qty" name="qty" type="number" value="1" min="1" class="form-control stepper" style="width:100% !important;">
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

				<!-- BANNER ROTATOR SM -->
				<div class="hidden-md-up  owl-carousel buttons-autohide controlls-over mb-60 text-center" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": true, "pagination": false, "transitionStyle":"goDown"}'>
							<div class="banner-rotator">
							<img class="img-fluid" src="<?= site_url('asset/content-images/slider-1-100x100.png');?>" width="270" height="350" alt="an offer's voucher">
							<div class="absolute" style="top:48%;">
								<a href="<?= base_url('home/bestSeller');?>">
								<p style="bottom:0px;">Best Seller 1</p>
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
							<div class="absolute" style="top:48%;">
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

				<ul id="myTab" class="nav nav-tabs nav-top-border mt-80" role="tablist">
					<li class="nav-item"><a class="nav-links active" href="#reviews" data-toggle="tab">Reviews</a></li>
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
												dummy &ndash;
												<span class="text-muted">12-12-2012</span> &ndash;
												<span class="fs-14 text-muted">
														<i class="fa fa-star"></i>
												</span>
											</h4>

											<p>
												hallo
											</p>

										</div>

									</div>
								<!-- /REVIEW ITEM -->

									<!-- <div class="text-center">
										<div class="container">
											<div class="container text-center" style="background: #ffcccc; border: 1px solid red;">
												<?= $this->session->userdata('error');?>
											</div>
										</div>
									</div> -->


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
										<textarea name="comment" id="text" class="form-control" rows="6" placeholder="Comment" maxlength="1000"></textarea>
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
