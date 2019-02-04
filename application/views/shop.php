<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

		<section class="page-header page-header-md">
			<div class="container">

				<h1><?= strtoupper($brand['name']);?></h1>

				<!-- breadcrumbs -->
				<!--<ol class="breadcrumb">-->
				<!--	<li><a href="#">Home</a></li>-->
				<!--	<li class="active">Product</li>-->
				<!--</ol>-->
				<!-- /breadcrumbs -->

			</div>
		</section>
		<!-- /PAGE HEADER -->

		<section>
			<div class="container">

				<div class="row">


					<!-- LEFT -->
					<div class="col-lg-3 col-md-3 col-sm-3 order-md-1 order-lg-1">

						<!-- CATEGORIES -->
						<div class="side-nav mb-60">

							<div class="side-nav-head" data-toggle="collapse" data-target="#categories">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>CATEGORIES</h4>
							</div>

<<<<<<< HEAD
							<ul id="categories" class="list-group list-group-bordered list-group-icon uppercase">
								<li class="list-group-noicon active">
									<a class="dropdown-toggle" href="#">MATTRESS</a>
									<ul>
										<li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Imperial Heritage</a></li>
										<li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Royal Souvergin</a></li>
										<li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Conoration</a></li>
										<li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Baron</a></li>
									</ul>
=======
                            <?php if($category != NULL):?>
							<ul id="categories" class="list-group list-group-bordered list-group-icon uppercase">
							    <?php foreach($category as $category):?>
								<li class="list-group-noicon active">
									<a href="<?= site_url('home/shop/'.$brand['id'].'/'.$category['id']);?>"><?= $category['name'];?></a>
>>>>>>> c90d821c990fc704273606204cee34ee117bd26c
								</li>
								<?php endforeach;?>
							</ul>
                            <?php endif;?>
						</div>
						<!-- /CATEGORIES -->

						<!-- BRANDS -->
						<div class="side-nav mb-60">

							<div class="side-nav-head" data-toggle="collapse" data-target="#brands">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>BRANDS</h4>
							</div>

							<ul id="brands" class="list-group list-unstyled">
<<<<<<< HEAD
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(21)</span> Aireloom</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(44)</span> KingKoil</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(2)</span> Serta</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(18)</span> Tempur</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(87)</span> Florence</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(32)</span> Stressless</a></li>
=======
								<li class="list-group-item"><a href="<?= site_url('home/shop/1/1');?>"><span class="fs-11 text-muted float-right"></span>AIRELOOM</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/shop/2/1');?>"><span class="fs-11 text-muted float-right"></span>KINGKOIL</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/shop/4/1');?>"><span class="fs-11 text-muted float-right"></span>SERTA</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/shop/5/1');?>"><span class="fs-11 text-muted float-right"></span>TEMPUR</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/shop/3/1');?>"><span class="fs-11 text-muted float-right"></span>FLORENCE</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/shop/6/1');?>"><span class="fs-11 text-muted float-right"></span>STRESSLESS</a></li>
>>>>>>> c90d821c990fc704273606204cee34ee117bd26c
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
					<div class="pajinate col-lg-9 col-md-9 col-sm-9 order-md-2 order-lg-2" data-pajinante-items-per-page="8"
					 data-pajinate-container=".pajinate-container">
					    <?php if($products == NULL):?>
                            <p align:"center">Product tidak tersedia</p>
                        <?php else:?>
						<!-- LIST OPTIONS -->
						<div class="pajinate-nav clearfix shop-list-options mb-20">

							<!-- Pagination Default -->
							<ul class="pagination m-0 float-right">
								<!-- pages added by pajinate plugin -->
							</ul>
							<!-- /Pagination Default -->

							<div class="options-left">
								<select>
									<option value="pos_asc">A-Z</option>
									<option value="pos_desc">Z-A</option>
									<option value="name_asc">Price Low to High</option>
									<option value="name_desc">Price High to Low</option>
									<option value="price_asc">Position ASC</option>
									<option value="price_desc">Position DESC</option>
								</select>
							</div>

						</div>
						<!-- /LIST OPTIONS -->

<<<<<<< HEAD

						<ul class="shop-item-list row list-inline m-0">

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
											<img class="img-fluid" src="<?= site_url('asset/content-images/01.jpg');?>" alt="product name" />
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->

										<!-- product more info -->
										<div class="shop-item-info">
											<span class="badge badge-success">NEW</span>
											<span class="badge badge-danger">SALE</span>
										</div>
										<!-- /product more info -->
									</div>

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-4 fs-13">
												<!-- rating-0 ... rating-5 -->
											</div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">
											<span class="line-through">Rp. 2,000,000</span>
											Rp. 1,800,000
										</div>
										<!-- /price -->
									</div>

									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<a class="btn btn-oldblue" href="<?= site_url('home/shopCart');?>"><i class="fa fa-cart-plus"></i> Add to Cart</a>
									</div>
									<!-- /buttons -->
								</div>

							</li>
							<!-- /ITEM -->

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
											<img class="img-fluid" src="<?= site_url('asset/content-images/01.jpg');?>" alt="product name" />
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="2" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->
									</div>

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-0 fs-13">
												<!-- rating-0 ... rating-5 -->
											</div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">
											Rp. 2,000,000
										</div>
										<!-- /price -->
									</div>

									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<span class="out-of-stock clean">out of stock</span><!-- add .clean to remove css characteres -->
									</div>
									<!-- /buttons -->
								</div>

							</li>
							<!-- /ITEM -->

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
											<img class="img-fluid" src="<?= site_url('asset/content-images/01.jpg');?>" alt="product name" />
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="3" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->

										<!-- countdown -->
										<div class="shop-item-counter">
											<div class="countdown" data-from="January 31, 2020 15:03:26" data-labels="years,months,weeks,days,hour,min,sec">
												<!-- Example Date From: December 31, 2018 15:03:26 -->
											</div>
										</div>
										<!-- /countdown -->
									</div>

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-1 fs-13">
												<!-- rating-0 ... rating-5 -->
											</div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">
											Rp. 2,000,000
										</div>
										<!-- /price -->
									</div>

									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<a class="btn btn-oldblue" href="<?= site_url('home/shopCart');?>"><i class="fa fa-cart-plus"></i> Add to Cart</a>
									</div>
									<!-- /buttons -->
								</div>

							</li>
							<!-- /ITEM -->

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
												<img class="img-fluid" src="<?= site_url('asset/content-images/01.jpg');?>" alt="product name">
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="4" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->

										<!-- product more info -->
										<div class="shop-item-info">
											<span class="badge badge-success">NEW</span>
										</div>
										<!-- /product more info -->
									</div>
=======
						<ul class="pajinate-container shop-item-list row list-inline m-0">
							<?php foreach ($products as $product): ?>
								<!-- ITEM -->
								<li class="col-lg-6 col-sm-6">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
												<img class="img-fluid" src="<?= site_url('asset/upload/'.$product['image']);?>" alt="product name" />
											</a>
											<!-- /product image(s) -->

											<!-- hover buttons -->
											<div class="shop-option-over">
												<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
												<a class="btn btn-light add-wishlist" href="#" data-item-id="2" data-toggle="tooltip" title="Add To Wishlist"><i
													class="fa fa-heart p-0"></i></a>
												</div>
												<!-- /hover buttons -->
											</div>
>>>>>>> c90d821c990fc704273606204cee34ee117bd26c

											<div class="shop-item-summary text-center">
												<h2><?= $product['name'];?> - <?= $product['id'];?></h2>

												<!-- rating -->
												<div class="shop-item-rating-line">
													<div class="rating rating-0 fs-13">
														<!-- rating-0 ... rating-5 -->
													</div>
												</div>
												<!-- /rating -->

												<!-- price -->
												<div class="shop-item-price">
													Rp. <?= number_format($product['MAX(a.price)'], 2, ",", ".");?>
												</div>
												<!-- /price -->
											</div>

<<<<<<< HEAD
							</li>
							<!-- /ITEM -->

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
											<img class="img-fluid" src="<?= site_url('asset/content-images/01.jpg');?>" alt="product name">
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="5" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->


										<!-- product more info -->
										<div class="shop-item-info">
											<span class="badge badge-danger">SALE</span>
										</div>
										<!-- /product more info -->
									</div>

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-4 fs-13">
												<!-- rating-0 ... rating-5 -->
=======
											<!-- buttons -->
											<div class="shop-item-buttons text-center">
												<a class="btn btn-oldblue" href="http://agm-cmrc.koliho.com/home/shopCart">
													<i class="fa fa-cart-plus"></i> Add to Cart
												</a><!-- add .clean to remove css characteres -->
>>>>>>> c90d821c990fc704273606204cee34ee117bd26c
											</div>
											<!-- /buttons -->
										</div>
<<<<<<< HEAD
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">
											<span class="line-through">Rp. 2,000,000</span>
											Rp. 1,800,000
										</div>
										<!-- /price -->
									</div>

									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<a class="btn btn-oldblue" href="<?= site_url('home/shopCart');?>"><i class="fa fa-cart-plus"></i> Add to Cart</a>
									</div>
									<!-- /buttons -->
								</div>

							</li>
							<!-- /ITEM -->

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
											<img class="img-fluid" src="<?= site_url('asset/content-images/01.jpg');?>" alt="product name">
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="6" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->

										<!-- countdown -->
										<div class="shop-item-counter">
											<div class="countdown" data-from="December 31, 2020 08:22:01" data-labels="years,months,weeks,days,hour,min,sec">
												<!-- Example Date From: December 31, 2018 15:03:26 -->
											</div>
										</div>
										<!-- /countdown -->
									</div>

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-4 fs-13">
												<!-- rating-0 ... rating-5 -->
											</div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">
											Rp. 2,000,000
										</div>
										<!-- /price -->
									</div>

									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<a class="btn btn-oldblue" href="<?= site_url('home/shopCart');?>"><i class="fa fa-cart-plus"></i> Add to Cart</a>
									</div>
									<!-- /buttons -->
								</div>

							</li>
							<!-- /ITEM -->

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
											<img class="img-fluid" src="<?= site_url('asset/content-images/slider-1-100x100.png');?>" alt="product name">
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="8" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->
									</div>

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-4 fs-13">
												<!-- rating-0 ... rating-5 -->
											</div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">
											Rp. 2,000,000
										</div>
										<!-- /price -->
									</div>

									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<a class="btn btn-oldblue" href="<?= site_url('home/shopCart');?>"><i class="fa fa-cart-plus"></i> Add to Cart</a>
									</div>
									<!-- /buttons -->
								</div>

							</li>
							<!-- /ITEM -->

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
											<img class="img-fluid" src="<?= site_url('asset/content-images/slider-1-100x100.png');?>" alt="product name">
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="11" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->

										<!-- countdown -->
										<div class="shop-item-counter">
											<div class="countdown" data-from="January 12, 2018 12:34:55" data-labels="years,months,weeks,days,hour,min,sec">
												<!-- Example Date From: December 31, 2018 15:03:26 -->
											</div>
										</div>
										<!-- /countdown -->
									</div>

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-4 fs-13">
												<!-- rating-0 ... rating-5 -->
											</div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">
											Rp. 2,000,000
										</div>
										<!-- /price -->
									</div>

									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<a class="btn btn-oldblue" href="<?= site_url('home/shopCart');?>"><i class="fa fa-cart-plus"></i> Add to Cart</a>
									</div>
									<!-- /buttons -->
								</div>

							</li>
							<!-- /ITEM -->

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
											<img class="img-fluid" src="<?= site_url('asset/content-images/slider-1-100x100.png');?>" alt="product name">
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="10" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->
									</div>

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-4 fs-13">
												<!-- rating-0 ... rating-5 -->
											</div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">
											Rp. 2,000,000
										</div>
										<!-- /price -->
									</div>

									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<a class="btn btn-oldblue" href="<?= site_url('home/shopCart');?>"><i class="fa fa-cart-plus"></i> Add to Cart</a>
									</div>
									<!-- /buttons -->
								</div>

							</li>
							<!-- /ITEM -->

							<!-- ITEM -->
							<li class="col-lg-6 col-sm-6">

								<div class="shop-item">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" href="<?= site_url('home/detailProduct');?>">
											<img class="img-fluid" src="<?= site_url('asset/content-images/slider-1-100x100.png');?>" alt="product name">
										</a>
										<!-- /product image(s) -->

										<!-- hover buttons -->
										<div class="shop-option-over">
											<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
											<a class="btn btn-light add-wishlist" href="#" data-item-id="12" data-toggle="tooltip" title="Add To Wishlist"><i
												 class="fa fa-heart p-0"></i></a>
										</div>
										<!-- /hover buttons -->

										<!-- product more info -->
										<div class="shop-item-info">
											<span class="badge badge-success">NEW</span>
											<span class="badge badge-danger">SALE</span>
										</div>
										<!-- /product more info -->
									</div>

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-4 fs-13">
												<!-- rating-0 ... rating-5 -->
											</div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">
											<span class="line-through">Rp. 2,000,000</span>
											Rp. 1,800.000
										</div>
										<!-- /price -->
									</div>

									<!-- buttons -->
									<div class="shop-item-buttons text-center">
										<a class="btn btn-oldblue" href="<?= site_url('home/shopCart');?>"><i class="fa fa-cart-plus"></i> Add to Cart</a>
									</div>
									<!-- /buttons -->
								</div>

							</li>
							<!-- /ITEM -->
=======
>>>>>>> c90d821c990fc704273606204cee34ee117bd26c

									</li>
							<?php endforeach; ?>
                            <!-- /ITEM -->
						</ul>
						<hr />

						<!-- Pagination Default -->
						<div class="pajinate-nav text-center">
							<ul class="pagination">
								<!-- pages added by pajinate plugin -->
							</ul>
						</div>
						<!-- /Pagination Default -->
						
                        <?php endif;?>
					</div>

				</div>

			</div>
		</section>
