<section class="page-header page-header-md">
	<div class="container">

		<h1>PRODUCT TITLE</h1>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li><a href="<?= site_url('#home');?>">Home</a></li>
			<li><a href="<?= site_url('home/shop');?>">Shop</a></li>
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
										<li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Imperial Heritage</a></li>
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

				<!-- BANNER ROTATOR -->
				<div class="owl-carousel buttons-autohide controlls-over mb-60 text-center" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": true, "pagination": false, "transitionStyle":"fadeUp"}'>
					<a href="#">
						<img class="img-fluid" src="<?= site_url('statis/agm-customer/assets/content-images/slider-2-100x100.png');?>" width="270" height="350" alt="promotion image">
					</a>
					<a href="#">
						<img class="img-fluid" src="<?= site_url('statis/agm-customer/assets/content-images/slider-1-100x100.png');?>" width="270" height="350" alt="promotion image">
					</a>
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
								<a class="lightbox bottom-right" href="<?= site_url('statis/agm-customer/assets/content-images/01.jpg');?>" data-plugin-options='{"type":"image"}'><i
									 class="glyphicon glyphicon-search"></i></a>
								<img class="img-fluid" src="<?= site_url('statis/agm-customer/assets/content-images/01.jpg');?>" alt="This is the product title" />
							</figure>

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

						<div class="clearfix mb-30">
							<span class="float-right text-oldblue"><i class="fa fa-check"></i> In Stock</span>
							<!--
										<span class="float-right text-danger"><i class="fa fa-remove"></i> Out of Stock</span>
										-->

							<strong>Product Name</strong>
						</div>


						<!-- short description -->
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<!-- /short description -->


						<!-- countdown -->
						<div class="text-center">
							<h5>Limited Offer</h5>
							<div class="countdown" data-from="January 31, 2020 15:03:26" data-labels="years,months,weeks,days,hour,min,sec">
								<!-- Example Date From: December 31, 2018 15:03:26 -->
							</div>
						</div>
						<!-- /countdown -->


						<hr />

						<!-- FORM -->
						<div class="row full-width justify-content-center">
							<form class="clearfix form-inline m-0" method="get" action="<?= site_url('home/shopCart');?>">
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
								<a href="<?= site_url('home/shopCart');?>"><button class="btn btn-oldblue float-left product-add-cart rad-0 p-0 w-130">ADD TO CART</button></a>	
								</div>

							</form>
						</div>

						<!-- /FORM -->


						<hr />


						<!-- Share -->
						<div class="float-right">

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook float-left" data-toggle="tooltip"
							 data-placement="top" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter float-left" data-toggle="tooltip"
							 data-placement="top" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-instagram float-left" data-toggle="tooltip"
							 data-placement="top" title="Instagram">
								<i class="icon-instagram2"></i>
								<i class="icon-instagram2"></i>
							</a>

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-whatsapp float-left" data-toggle="tooltip"
							 data-placement="top" title="Whatsapp">
								<i class="icon-call"></i>
								<i class="icon-call"></i>
							</a>

						</div>
						<!-- /Share -->


						<!-- rating -->
						<div class="rating rating-4 fs-13 mt-10 fw-100">
							<!-- rating-0 ... rating-5 -->
						</div>
						<!-- /rating -->

					</div>
					<!-- /ITEM DESC -->

				</div>



				<ul id="myTab" class="nav nav-tabs nav-top-border mt-80" role="tablist">
					<li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab">Description</a></li>
					<li class="nav-item"><a class="nav-link" href="#specs" data-toggle="tab">Specifications</a></li>
					<li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab">Reviews (2)</a></li>
				</ul>

				<div class="tab-content pt-20">
					<!-- DESCRIPTION -->
					<div role="tabpanel" class="tab-pane active" id="description">
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum
							tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas
							semper. Aenean ultricies mi vitae est. Aliquam fermentum commodo magna, id pretium nisi elementum at. Nulla
							molestie, ligula in fringilla rhoncus, risus leo dictum est, nec egestas nunc sem tincidunt turpis. Sed
							posuere consectetur est at lobortis.</p>
						<p>Donec blandit ultrices condimentum. Aliquam fermentum commodo magna, id pretium nisi elementum at. Nulla
							molestie, ligula in fringilla rhoncus, risus leo dictum est, nec egestas nunc sem tincidunt turpis. Sed
							posuere consectetur est at lobortis.</p>
					</div>

					<!-- SPECIFICATIONS -->
					<div role="tabpanel" class="tab-pane fade" id="specs">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Column name</th>
										<th>Column name</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Size</td>
										<td>2XL</td>
									</tr>
									<tr>
										<td>Color</td>
										<td>Red</td>
									</tr>
									<tr>
										<td>Weight</td>
										<td>132lbs</td>
									</tr>
									<tr>
										<td>Height</td>
										<td>74cm</td>
									</tr>
									<tr>
										<td>Bluetooth</td>
										<td><i class="fa fa-check text-success"></i> YES</td>
									</tr>
									<tr>
										<td>Wi-Fi</td>
										<td><i class="fa fa-remove text-danger"></i> NO</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<!-- REVIEWS -->
					<div role="tabpanel" class="tab-pane fade" id="reviews">
						<!-- REVIEW ITEM -->
						<div class="block mb-60">

							<span class="user-avatar">
								<!-- user-avatar -->
								<img class="float-left media-object" src="<?= site_url('statis/agm-customer/assets/another-images/avatar2.jpg');?>" width="64" height="64" alt="username's avatar">
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
								<img class="float-left media-object" src="<?= site_url('statis/agm-customer/assets/another-images/avatar2.jpg');?>" width="64" height="64" alt="username's avatar">
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
