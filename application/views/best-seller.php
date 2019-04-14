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
								<li class="list-group-item"><a href="<?= site_url('home/bestSeller/1');?>"> Aireloom</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/bestSeller/2');?>"> KingKoil</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/bestSeller/4');?>"> Serta</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/bestSeller/5');?>"> Tempur</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/bestSeller/3');?>"> Stressless</a></li>
								<li class="list-group-item"><a href="<?= site_url('home/bestSeller/6');?>"> Florence</a></li>
							</ul>

						</div>
						<!-- BRANDS -->
					</div>

					<!-- RIGHT -->
					<div class="col-lg-9 col-md-9 col-sm-9 order-md-2 order-lg-2">
						<?php if ($products == NULL): ?>
							<div class="rows">
								<div class="col-xs-12 border text-center">
									<p>Product tidak tersedia</p>
								</div>
							</div>
						<?php else: ?>
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

							<?php foreach ($products as $product): ?>
								<!-- ITEM -->
								<li class="col-lg-4 col-sm-4">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="<?= site_url('home/detailProduct/'.$product['id']);?>">
												<img class="img-fluid" src="<?= site_url('asset/upload/'.$product['image']);?>" alt="product name" />
											</a>
											<!-- /product image(s) -->

										</div>

										<div class="shop-item-summary text-center">
											<h2><?= $product['name']?></h2>

											<!-- rating -->
											<div class="shop-item-rating-line">
												<div class="rating rating-<?= $product['stars']?> fs-13">
													<!-- rating-0 ... rating-5 -->
												</div>
											</div>
											<!-- /rating -->

											<!-- price -->
											<!-- <div class="shop-item-price">
												Rp. 1,800,000
											</div> -->
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
							<?php endforeach; ?>


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
					<?php endif; ?>
				</div>

			</div>
		</section>
