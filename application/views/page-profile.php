<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
		<!-- -->
		<section class="section-xs">
			<div class="container">
				<div class="row">

					<!-- LEFT -->

					<!-- CATEGORIES -->
					<div class="col-12 col-md-3 order-md-1 order-lg-1">

						<div class="side-nav mb-60">

							<div class="side-nav-head" data-toggle="collapse" data-target="#categories">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>NAVIGATION</h4>
							</div>

							<ul id="categories" class="list-group list-group-bordered list-group-noicon uppercase">

								<li class="fs-13 bullet-bar">
								    <a href="<?= base_url('home/historyPage');?>"> Riwayat
								    </a>
								</li>
								<li class="fs-13">
								    <a href="<?= base_url('home/transactionPage');?>"> Status Transaksi
								    </a>
								</li>
								<li class="fs-13">
								    <a href="<?= base_url('home/profilePage');?>"> Profil
								    </a>
								</li>

							</ul>

						</div>
					</div>
					<!-- /CATEGORIES -->

					<!-- RIGHT -->
					<div class="col-12 col-md-9 mb-80 order-md-2 order-lg-1">

						<ul class="nav nav-tabs nav-top-border">
							<li class="active"><a href="#info" data-toggle="tab">Personal Info</a></li>
						</ul>

						<div class="tab-content">

							<!-- PERSONAL INFO TAB -->
							<div class="col-12 col-md-12">
								<a class="fs-13 btn btn-sm btn-oldblue" href="<?= base_url('home/profileSetting');?>"><i class="fa fa-info-circle"></i>Change</a>
								<h3 class="mb-10 mt-10">Sherlock Holmes</h3>
								<div class="block"><i class="glyphicon glyphicon-envelope pr-5 line-height-40"></i><?= $profile['email']?></div>
								<div class="block"><i class="fa fa-phone pr-5 line-height-40"></i><?= $profile['phone']?></div>
								<div class="block"><i class="fa fa-home pr-5 line-height-40"></i><?= $profile['address']?></div>
							</div>
							<hr>
						</div>
						<!-- /PERSONAL INFO TAB -->

					</div>

				</div>

			</div>
		</section>
		<!-- / -->
