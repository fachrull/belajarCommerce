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
		<div id="header" class="navbar-toggleable-md sticky clearfix">

			<!-- SEARCH HEADER -->
			<div class="search-box over-header">
				<a id="closeSearch" href="<?= site_url('#');?>" class="fa fa-remove"></a>

				<form action="search-result-1.html" method="get">
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

						<!-- SEARCH -->
						<li class="search">
							<i class="fa fa-search"></i>
						</li>
						<!-- /SEARCH -->

						<!-- CART -->
						<!-- <li class="nav-item dropdown">
              <a href="<?= site_url('#');?>" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dorpdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-user"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a href="#">Login</a>
								<a href="#">Logout</a>
							</div>
						</li> -->

						<li class="nav-item dropdown">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          			<i class="fa fa-user"></i>
        			</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php if($this->session->userdata('isLogin', TRUE)): ?>
									<a class="dropdown-item" href="<?= site_url('auth/logout');?>">Logout</a>
								<?php else: ?>
          				<a class="dropdown-item" href="<?= site_url('auth/login');?>">Login</a>
								<?php endif; ?>
        			</div>
      			</li>
						<!-- /CART -->
					</ul>
					<!-- /BUTTONS -->

					<!-- Logo -->
					<a class="logo float-left page-scroll" href="<?= site_url('#home');?>">
						<img src="<?= base_url('asset/logo-agm/logo.png');?>" alt="" />
					</a>
					<div class="navbar-collapse collapse nav-main-collapse">
						<nav class="nav-main text-center">
							<ul id="topMain" class="nav nav-pills nav-main text-center">
                <?php if($this->session->userdata('uType') == 3): ?>
                      <li><a class="page-scroll" href="<?= site_url('home/store');?>">MY STORE</a></li>
                      <li><a class="page-scroll" href="<?= site_url('#');?>">INVOICE</a></li>
                      <li><a class="page-scroll" href="<?= site_url('#');?>">PRODUCT</a></li>

                <!-- This is navbar for admin -->
                <?php elseif($this->session->userdata('uType') == 4): ?>
                      <li><a class="page-scroll" href="<?= site_url('home/customer');?>">PROFILE</a></li>
                      <li><a class="page-scroll" href="<?= site_url('#')?>">PURCHASES</a></li>
								<?php else: ?>
									<!-- HOME -->
									<li><a class="page-scroll" href="<?= site_url('#product');?>">PRODUCT</a></li>
									<li><a class="page-scroll" href="<?= site_url('#promotion');?>">PROMOTION</a></li>
									<li><a class="page-scroll" href="<?= site_url('#agmpedia');?>">AGMPEDIA</a></li>
									<li><a class="page-scroll" href="<?= site_url('#location');?>">LOCATION</a></li>
	                <li><a class="page-scroll" href="<?= site_url('#shopLoadModal');?>">PARTNERSHIP</a></li>
                <?php endif; ?>
							</ul>
						</nav>
					</div>

				</div>
			</header>
			<!-- /Top Nav -->
		</div>
