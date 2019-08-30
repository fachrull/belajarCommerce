<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-md">
	<div class="container">
		<h1 class="text-uppercase"><?= $specialPckg['name']?></h1>

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
                        <li class="list-group-item"><a href="<?= site_url('home/shop/stressless');?>">Stressless</a></li>
                    </ul>

				</div>
				<!-- BRANDS -->

				<!-- BANNER ROTATOR MD -->
				<div class="hidden-sm-down  owl-carousel buttons-autohide controlls-over mb-60 text-center" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": true, "pagination": false, "transitionStyle":"goDown"}'>
					<?php foreach ($bestSellers as $bestSeller): ?>
						<div class="banner-rotator">
							<img class="img-fluid" src="<?= site_url('asset/upload/'.$bestSeller['image']);?>" width="270" height="350" alt="<?= $bestSeller['name']?>">
								<div class="absolute" style="top:45%;">
									<a href="<?= base_url('home/detailProduct/'.$bestSeller['slugs']);?>">
									</a>
								</div>
								<div class="absolute position-bottom">
									<a href="<?= base_url('home/detailProduct/'.$bestSeller['slugs']);?>">
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

                <!-- SPECIAL PACKAGE IMAGE -->

					<!-- IMAGE -->
					<div class="col-lg-6 col-sm-6">
					<img src="<?= base_url('asset/upload/special-package/'.$specialPckg['image']);?>" alt="<?= $specialPckg['name']?>" class="special-package-cover">
					<table class="table table-bordered text-center">
                <tbody class="text-center">
                <tr style="font-size:16px;">
                  <th>Product</th>
                  <th>Size</th>
                  <th style="width: 10px">Qty</th>
                  <th>Price</th>
                </tr>
                <?php foreach ($details as $detail): ?>
                  <tr style="font-size:10px;">
                    <td><?= $detail['prod']?></td>
                    <td><?= $detail['sizeName'].' ('.$detail['sizeDetail'].')'?></td>
                    <td><?= $detail['quantity']?></td>
                    <td>Rp. <?= number_format(floatval(0),0,',','.')?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

					</div>
					<!-- /IMAGE -->

					<!-- ITEM DESC -->
					<div class="col-lg-6 col-sm-6">

						<div class="shop-item-price mt-0">
							<span class="pl-0 bold fs-24 mt-0"><strong><?= $specialPckg['name']?></strong></span>
							<!-- rating -->
						<div class="rating fs-17 mt-10 fw-100 float-right">
							<!-- rating-0 ... rating-5 -->
						</div>
						<!-- /rating -->
						</div>

						<div class="mb-15 pl-0">
							<p class="text-left fs-18 bold" id="price2">
							Rp. <span ><?=number_format(floatval($specialPckg['price']), 0, ',', '.')?></span>
							</p>

						</div>

						<hr />

						<!-- short description -->
						<p class="mt-10"><?= $specialPckg['description']?></p>
						<!-- /short description -->

						<hr />

						<div class="toggle">
									<label  id="stockLabel">Checking the stocks</label>

									<div class="toggle-content">
										<div class="clearfix mb-30">
											<span id="stockDetailSP" class="float-right text-oldblue"><i id="stockIcon" class="fa fa-check"></i> In Stock</span>
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
						<div id="shoppingFormSP" class="row text-center">
							<form id="cart_form" class="clearfix form-inline m-0" method="post" action="<?= site_url('home/addToCart');?>">
								<input type="hidden" id="product_id" name="product_id" value="<?= $specialPckg['id'];?>" />
                <input type="hidden" name="sku" value="<?= $specialPckg['sku']?>"/>
								<input type="hidden" name="product_name" value="<?= $specialPckg['name'];?>" />
								<input type="hidden" id="price" name="price" />
								<input type="hidden" id="size-name" name="size-name" />

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


		</div>

	</div>
</section>
<!-- / -->
