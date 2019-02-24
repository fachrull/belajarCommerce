<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

		<section class="page-header page-header-md">
			<div class="container">

				<h1>BEST SELLER</h1>

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
						<!-- LIST OPTIONS -->
						<div class="clearfix shop-list-options mb-20">

							<ul class="pagination m-0 float-right">
								<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
							</ul>

							<div class="options-left">
								<select>
									<option value="name_asc">A-Z</option>
									<option value="name_desc">Z-A</option>
									<option value="price_asc">Price Low to High</option>
									<option value="price_desc">Price High to Low</option>
									<option value="pos_asc">Position ASC</option>
									<option value="pos_desc">Position DESC</option>
								</select>
							</div>
						</div>
						<!-- /LIST OPTIONS -->


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

									<div class="shop-item-summary text-center">
										<h2>Product Name</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-5 fs-13">
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

						</ul>

						<hr />

						<!-- Pagination Default -->
						<div class="text-center">
							<ul class="pagination">
								<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item"><a class="page-link" href="#">5</a></li>
								<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
							</ul>
						</div>
						<!-- /Pagination Default -->

					</div>

				</div>

			</div>
		</section>
