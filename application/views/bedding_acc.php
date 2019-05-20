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
							<?php if ($category != NULL){ ?>
								<ul id="categories" class="list-group list-group-bordered list-group-icon uppercase">
									<?php foreach($category as $category):?>
									<li class="list-group-noicon active">
										<a href="<?= site_url('home/bedding_Acc/'.$brand['id'].'/'.$category['id']);?>"><?= $category['name'];?></a>
									</li>
								<?php endforeach;?>
								</ul>
							<?php } ?>
						</div>
						<!-- /CATEGORIES -->

						<!-- BRANDS -->
						<div class="side-nav mb-60">

							<div class="side-nav-head" data-toggle="collapse" data-target="#brands">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>BRANDS</h4>
							</div>

							<ul id="brands" class="list-group list-unstyled">
                <?php foreach ($brands as $brandBA): ?>
                  <li class="list-group-item"><a href="<?= site_url('home/bedding_Acc/'.$brandBA['id']);?>"><?= $brandBA['name']?></a></li>
                <?php endforeach; ?>
							</ul>

						</div>
						<!-- BRANDS -->


						<!-- BANNER ROTATOR -->
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
					<div class="pajinate col-lg-9 col-md-9 col-sm-9 order-md-2 order-lg-2" data-pajinante-items-per-page="12"
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

						</div>
						<!-- /LIST OPTIONS -->
						<ul class="pajinate-container shop-item-list row list-inline m-0">
							<?php foreach ($products as $product): ?>
								<!-- ITEM -->
								<li class="col-lg-4 col-sm-4">

									<div class="shop-item">

										<div class="thumbnail">
											<!-- product image(s) -->
											<a class="shop-item-image" href="<?= site_url('home/detailProduct/'.$product['id']);?>">
												<img class="img-fluid" src="<?= site_url('asset/upload/'.$product['image_1']);?>" alt="product name" />
											</a>
											<!-- /product image(s) -->

											<div class="shop-item-summary text-center">
												<h2><?= $product['name'];?></h2>

												<!-- rating -->
												<div class="shop-item-rating-line">
													<div class="rating rating-<?= $product['stars']?> fs-13">
														<!-- rating-0 ... rating-5 -->
													</div>
												</div>
												<!-- /rating -->
												<p>Starts from</p>
												<!-- price -->
												<div class="shop-item-price">
													Rp. <?= number_format($product['price'], 2, ",", ".");?>
												</div>
												<!-- /price -->
											</div>

											<!-- buttons -->
											<div class="shop-item-buttons text-center">
                                                <a class="btn btn-md btn-oldblue mb-15" href="<?= site_url('home/detailProduct/'.$product['id']);?>">
                                                    <i class="fa fa-eye"></i> View Detail
                                                </a><!-- add .clean to remove css characteres -->
											</div>
											<!-- /buttons -->
										</div>
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
