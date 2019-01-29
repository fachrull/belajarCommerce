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
</head>

<body class="smoothscroll enable-animation">

	<!-- wrapper -->
	<div id="wrapper">

		<div id="header" class="navbar-toggleable-md sticky header-sm bottom clearfix">

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
					<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>

					<!-- BUTTONS -->
					<ul class="float-right nav nav-pills nav-second-main">

						<!-- USER -->
						<li>
							<a href="<?= site_url('auth/login');?>">
								<i class=" fa fa-user"></i>
							</a>
						</li>
						<!-- /USER -->

						<!-- SEARCH -->
						<li class="search">
							<a href="javascript:;">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<!-- /SEARCH -->
					</ul>
					<!-- /BUTTONS -->

					<!-- Logo -->
					<a class="logo float-left" href="<?= base_url('')?>">
						<img src="<?= base_url('asset/logo-agm/logo.png');?>" alt="" />
					</a>
					<div class="navbar-collapse collapse nav-main-collapse">
						<nav class="nav-main text-center">
							<ul id="topMain" class="nav nav-pills nav-main text-center">
								<li class="dropdown active">
									<!-- HOME -->
									<a class="dropdown-toggle" href="#">
										PRODUCT
									</a>
									<ul class="dropdown-menu">
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop');?>">
												AIRELOOM
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop');?>">
												KINGKOIL
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop');?>">
												SERTA
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop');?>">
												TEMPUR
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop');?>">
												FLORENCE
											</a>
										</li>
										<li class="dropdown">
											<a class="fs-14" href="<?= base_url('home/shop');?>">
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
									<a class="scrollTo" href="#location">
										LOCATION
									</a>
								</li>
								<li>
									<!-- HOME -->
									<a href="<?= base_url('home/partnership')?>">
										PARTNERSHIP
									</a>
								</li>
							</ul>
						</nav>
					</div>

				</div>
			</header>
			<!-- /Top Nav -->
		</div>
