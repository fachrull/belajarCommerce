<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script src="https://www.google.com/recaptcha/api.js?render=6Lcxm5wUAAAAAEhnAdo5xeknvh7RXGpTqWq5XDTO"></script>

<section class="page-header page-header-md">
	<div class="container">
		<img src="<?= base_url('asset/brands/'.$brand['logo']);?>" />

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
						<?php foreach ($categories as $category): ?>
							<li class="list-group-noicon active">
								<a class="pt-4 pb-4" href="<?= site_url('home/shop/'.$brand['slugs'].'/'.$category['slugs'])?>"><?= $category['name']?></a>
							</li>
						<?php endforeach; ?>
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
                        <li class="list-group-item"><a href="<?= site_url('home/shop/aireloom');?>">Aireloom</a></li>
                        <li class="list-group-item"><a href="<?= site_url('home/shop/kingkoil');?>">Kingkoil</a></li>
                        <li class="list-group-item"><a href="<?= site_url('home/shop/serta');?>">Serta</a></li>
                        <li class="list-group-item"><a href="<?= site_url('home/shop/tempur');?>">Tempur</a></li>
                        <li class="list-group-item"><a href="<?= site_url('home/shop/florence');?>">Florence</a></li>
						<li class="list-group-item"><a href="<?= site_url('home/shop/ogawa');?>">Ogawa</a></li>
                    </ul>

				</div>
				<!-- BRANDS -->

				<!-- BANNER ROTATOR MD -->
				<div class="hidden-sm-down  owl-carousel buttons-autohide controlls-over mb-60 text-center" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": true, "pagination": false, "transitionStyle":"goDown"}'>
					<?php foreach ($bestSellers as $bestSeller): ?>
						<div class="banner-rotator">
							<img class="img-fluid" src="<?= site_url('asset/upload/'.$bestSeller['image']);?>" width="270" height="350" alt="<?= $bestSeller['name']?>">
								<div class="absolute" style="top:45%;">
									<a href="<?= base_url('home/detailProduct/'.$bestSeller['id']);?>">
									</a>
								</div>
								<div class="absolute position-bottom">
									<a href="<?= base_url('home/detailProduct/'.$bestSeller['id']);?>">
										<p>
											<?= $bestSeller['name']?><br>
											View Detail
										</p>
									</a>
								</div>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- /BANNER ROTATOR -->

			</div>


			<!-- RIGHT -->
			<div class="col-lg-9 col-md-9 col-sm-9 order-md-2 order-lg-2">

				<div class="row">

					<!-- IMAGE -->
					<div class="col-lg-6 col-sm-6">

					<div class="owl-carousel buttons-autohide controlls-over text-center mb-0" data-plugin-options='{"singleItem": true, "autoPlay": 8000, "navigation": true, "pagination": false}'>
                        <?php if($image['image_1'] != NULL): ?>
                        <div class="relative mb-3">
                            <a class="lightbox bottom-right" href="<?= site_url('asset/upload/'.$image['image_1']);?>" data-plugin-options='{"type":"image"}'>
                                <img class="img-fluid" src="<?= site_url('asset/upload/'.$image['image_1']);?>" alt="This is the product title" />
                            </a>
                        </div>
                        <?php endif; if($image['image_2'] != NULL): ?>
                        <div class="relative mb-3">
                            <a class="lightbox bottom-right" href="<?= site_url('asset/upload/'.$image['image_2']);?>" data-plugin-options='{"type":"image"}'>
                                <img class="img-fluid" src="<?= site_url('asset/upload/'.$image['image_2']);?>" alt="This is the product title" />
                            </a>
                        </div>
                        <?php endif; if($image['image_3'] != NULL): ?>
                        <div class="relative mb-3">
                            <a class="lightbox bottom-right" href="<?= site_url('asset/upload/'.$image['image_3']);?>" data-plugin-options='{"type":"image"}'>
                                <img class="img-fluid" src="<?= site_url('asset/upload/'.$image['image_3']);?>" alt="This is the product title" />
                            </a>
                        </div>
                        <?php endif; ?>
					</div>


                        <?php if ($specs != null): ?>
                            <div class="tabbed hidden-lg-down text-center">
                                <?php foreach ($specs as $spec): ?>
                                    <a id="1">
                                        <?php $icon = "3_Zone_Ortho_Spring.png";
                                        if ($spec['icon'] != null) {
                                            $icon = $spec['icon'];
                                        } ?>
                                        <img class="thumbnail-specs" src="<?= base_url('asset/spec/'.$icon); ?>" alt="">
                                        <div style="width:100%">
                                            <h4 class="text-center"><?= $spec['name']; ?></h4>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

					</div>
					<!-- /IMAGE -->

					<!-- ITEM DESC -->
					<div class="col-lg-6 col-sm-6">

						<div class="shop-item-price mt-0">
							<span class="pl-0 bold fs-24 mt-0"><strong><?= $product['name'];?></strong></span>
							<!-- rating -->
						<div class="rating rating-<?= $product['stars'];?> fs-17 mt-10 fw-100 float-right">
							<!-- rating-0 ... rating-5 -->
						</div>
						<!-- /rating -->
						</div>

						<div class="mb-15 pl-0">
                            <p class="text-left fs-18 bold" id="price2">
                                <?php if ($product['min_price'] != $product['max_price']) { ?>
                                    Rp. <span><?= number_format(floatval($product['min_price']), 0, ',', '.') ?></span>
                                    -
                                    Rp. <span><?= number_format(floatval($product['max_price']), 0, ',', '.') ?></span>
                                <?php } else { ?>
                                    Rp. <span><?= number_format(floatval($product['min_price']), 0, ',', '.') ?></span>
                                <?php } ?>
                            </p>

						</div>

						<hr />

						<!-- short description -->
						<p class="mt-10"><?= $product['description'];?></p>
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
								<input type="hidden" id="product_id" name="product_id" value="<?= $product['id'];?>" />
                                <input type="hidden" id="sku" name="sku" />
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
					<?php foreach ($bestSellers as $bestSeller): ?>
						<div class="banner-rotator">
							<img class="img-fluid" src="<?= site_url('asset/upload/'.$bestSeller['image']);?>" width="270" height="350" alt="<?= $bestSeller['name']?>">
								<div class="absolute" style="top:45%;">
									<a href="<?= base_url('home/detailProduct/'.$bestSeller['id']);?>">
									</a>
								</div>
								<div class="absolute position-bottom">
									<a href="<?= base_url('home/detailProduct/'.$bestSeller['id']);?>">
										<p>
											<?= $bestSeller['name']?><br>
											View Detail
										</p>
									</a>
								</div>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- /BANNER ROTATOR -->

				<ul id="review-section" class="nav nav-tabs nav-top-border mt-80" role="tablist">
					<li class="nav-item"><a class="nav-links active" href="#reviews" data-toggle="tab">Reviews</a></li>
				</ul>

				<div class="tab-content pt-20">
					<!-- REVIEWS -->
					<div role="tabpanel" id="reviews">
								<!-- REVIEW ITEM -->
								<?php if ($reviews == NULL): ?>
									<div class="block mb-60 text-center border">
										<p>Komentar tidak ada.</p>
									</div>
								<?php else: ?>
									<?php foreach ($reviews as $review): ?>
										<div class="block mb-60">

											<span class="user-avatar">
												<!-- user-avatar -->
												<img class="float-left media-object" src="<?= base_url('');?>asset/another-images/avatar2.jpg" width="64" height="64" alt="username's avatar">
											</span>

											<div class="media-body">
												<h4 class="media-heading fs-14">
													<?= $review['name']?> &ndash;
													<span class="text-muted"><?= $review['date_attempt']?></span> &ndash;
													<span class="fs-14 text-muted">
														<?php for($i = 0; $i < $review['stars']; $i++): ?>
															<i class="fa fa-star"></i>
														<?php endfor; ?>
													</span>
												</h4>

												<p>
													<?= $review['comment']?>
												</p>

											</div>

										</div>
									<?php endforeach; ?>
								<?php endif; ?>
								<!-- /REVIEW ITEM -->

								<?php if ($this->session->has_userdata('error')): ?>
									<div class="text-center">
										<div class="container">
											<div class="container text-center" style="background: #ffcccc; border: 1px solid red;">
												<?= $this->session->userdata('error');?>
											</div>
                                            <div class="container text-center" style="background: greenyellow; border: 1px solid lawngreen;">
                                                <?= $this->session->userdata('success');?>
                                            </div>
										</div>
									</div>
								<?php endif; ?>


								<!-- REVIEW FORM -->
								<h4 class="page-header mb-40">ADD A REVIEW</h4>
								<form method="post" action="<?= site_url('home/reviewProduct/'.$product['id'])?>" id="form-review">

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
										<textarea name="comment" id="comment" class="form-control" rows="6" placeholder="Comment" maxlength="1000"></textarea>
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

                                    <input type="hidden" name="token" id="token">

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
