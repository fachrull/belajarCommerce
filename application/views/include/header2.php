<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en" id="home">

<head>
	<title>The Most Complete Mattress Shopping Center | American Giant Mattress</title>
	<meta charset="utf-8" />
	<meta name="description" content="American Giant Mattress, AGM, a trusted online mattress shop sells comfortable mattressess and etc." />
	<meta name="Author" />
	<link rel="icon" type="image/icon" href="<?= base_url('asset/logo-agm/favicon.png');?>">

	<!-- mobile settings -->
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

	<!-- WEB FONTS : use %7C instead of | (pipe) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700"
	 rel="stylesheet" type="text/css" />

	<!-- CORE CSS -->
	<link href="<?= base_url('asset/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />

	<!-- SWIPER SLIDER -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/slider.swiper/dist/css/swiper.css');?>">

	<!-- THEME CSS -->
	<link href="<?= base_url('asset/css/essentials.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('asset/css/layout.css');?>" rel="stylesheet" type="text/css" />

	<!-- PAGE LEVEL SCRIPTS -->
	<link href="<?= base_url('asset/css/header-1.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('asset/css/layout-shop.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('asset/css/lightgrey.css');?>" rel="stylesheet" type="text/css" id="color_scheme" />
	<link href="<?= base_url('asset/css/pack-megashop.css');?>" rel="stylesheet" type="text/css" />
	
</head>

<body class="smoothscroll enable-animation">

	<!-- wrapper -->
	<div id="wrapper">

		<div id="header" class="navbar-toggleable-md sticky header-sm clearfix">

			<!-- SEARCH HEADER -->
			<div class="search-box over-header">
				<a id="closeSearch" href="index-home-before-login.html" class="fa fa-remove"></a>

				<form action="search-result.html" method="get">
					<input type="text" class="form-control" placeholder="SEARCH" />
				</form>
			</div>
			<!-- /SEARCH HEADER -->


			<!-- TOP NAV -->
			<header id="topNav">
				<div class="container">

					<!-- Mobile Menu Button -->
					<button class="btn btn-mobile pl-0" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>

					<!-- BUTTONS -->
					<ul class="list-inline header-buttons float-right nav nav-pills nav-second-main mt-0 bl-0 pl-0">
						<li class="header-button-arrow hidden-lg-down">
							<a href="#" class="dropdown h-60 line-height-60" data-toggle="dropdown" data-hover="dropdown">
								<i class="fa fa-user"></i>

<<<<<<< HEAD
						<!-- USER -->
						<li>
							<a href="<?= site_url('auth/login');?>">
								<i class=" fa fa-user"></i>
							</a>
=======
							</a>
							<div class="dropdown-menu dropdown-menu-right m-0 p-0">
								<a class="dropdown-item fs-14 text-muted uppercase mb-3" href="<?= base_url('home/historyPage');?>">RIWAYAT</a>
								<a class="dropdown-item fs-14 text-muted uppercase mb-3" href="<?= base_url('home/wishlistPage');?>">WISHLIST</a>
								<a class="dropdown-item fs-14 text-muted uppercase mb-3" href="<?= base_url('home/transactionPage');?>">STATUS TRANSASKSI</a>
								<a class="dropdown-item fs-14 text-muted uppercase mb-3" href="<?= base_url('home/profilePage');?>">PROFIL</a>
								<a class="dropdown-item fs-14 text-muted uppercase mb-3" href="<?= base_url('auth/login');?>">LOGIN</a>
								<!--<a class="dropdown-item fs-14 text-muted uppercase dropdown-custom-icon dropdown-myaccount-logout" href="#">-->
								<!--	<i class="fa fa-power-off"></i>-->
								<!--	<b>LOG OUT</b>-->
								<!--</a>-->
>>>>>>> c90d821c990fc704273606204cee34ee117bd26c
						</li>
						<li class="search">
							<a href=" javascript:;">
								<i class="fa fa-search h-60 line-height-60"></i>
							</a>
						</li>
					</ul>
					<ul class="list-inline header-buttons float-right nav nav-pills nav-second-main mt-15 mr-0 p-0">
						<li>
							<a href="#" class="h-30 line-height-30"></a>
						</li>
					</ul>
					<!-- /BUTTONS -->

					<!-- Logo -->
					<a class="logo float-left" href="<?= base_url('')?>">
						<img src="<?= base_url('asset/logo-agm/logo.png');?>" alt="" />
					</a>
					<div class="navbar-collapse collapse nav-main-collapse">
						<nav class="nav-main text-center">
							<ul id="topMain" class="nav nav-pills nav-main text-center">
								<li class="dropdown">
									<!-- HOME -->
									<a class="dropdown-toggle" href="#">
										PRODUCT
									</a>
									<ul class="dropdown-menu">
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop/1/1');?>">
												AIRELOOM
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop/2/1');?>">
												KINGKOIL
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop/4/1');?>">
												SERTA
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop/5/1');?>">
												TEMPUR
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop/3/1');?>">
												FLORENCE
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop/6/1');?>">
												STRESSLESS
											</a>
										</li>
									</ul>
								</li>
								<li>
									<!-- HOME -->
									<a href="<?= base_url('home/promotionPage');?>">
										PROMOTION
									</a>
								</li>
								<li>
									<!-- HOME -->
									<a href="<?= base_url('home/listArticle');?>">
										AGMPEDIA
									</a>
								</li>
								<li>
									<!-- HOME -->
<<<<<<< HEAD
									<a href="<?= base_url('#location');?>">
=======
									<a class="scrollTo" href="#location">
>>>>>>> c90d821c990fc704273606204cee34ee117bd26c
										LOCATION
									</a>
								</li>
								<li>
									<!-- HOME -->
									<a href="<?= base_url('home/partnership')?>">
										PARTNERSHIP
									</a>
								</li>
								<li class="dropdown active hidden-lg-up">
									<!-- HOME -->
									<a class="dropdown-toggle" href="#">
										USERNAME
									</a>
									<ul class="dropdown-menu">
										<li class="dropdown">
											<a class="fs-14" href="shop.html">
												HISTORY
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="shop.html">
												WISHLIST
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="shop.html">
												PROFILE
											</a>
										</li>
										<!--<li class="dropdown">-->
										<!--	<a class="fs-14" href="shop.html">-->
										<!--		LOREM-->
										<!--	</a>-->
										<!--</li>-->
										<!--<li class="dropdown">-->
										<!--	<a class="fs-14" href="shop.html">-->
										<!--		LOGOUT-->
										<!--	</a>-->
										<!--</li>-->
									</ul>
								</li>
							</ul>
						</nav>
					</div>

				</div>
			</header>
			<!-- /Top Nav -->
		</div>