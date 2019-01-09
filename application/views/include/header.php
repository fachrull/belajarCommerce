<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>AGM - American Giant Mattress</title>
	<meta name="description" content="" />
	<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

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
	<link href="<?= base_url('asset/css/lightgrey.css');?>" rel="stylesheet" type="text/css" id="color_scheme" />

</head>

<body class="smoothscroll enable-animation">



	<!-- wrapper -->
	<div id="wrapper">
		<div id="header" class="navbar-toggleable-md sticky clearfix">

			<!-- SEARCH HEADER -->
			<div class="search-box over-header">
				<a id="closeSearch" href="#" class="fa fa-remove"></a>

				<form action="page-search-result-1.html" method="get">
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
							<!-- <a href="<?= base_url('asset/javascript');?>"> -->
              <a href="#">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<!-- /SEARCH -->

						<!-- CART -->
						<li class="search">
							<!-- <a href="<?= base_url('asset/javascript');?>"> -->
              <a href="#">
								<i class="fa fa-user"></i>
							</a>
						</li>
						<!-- /CART -->


					</ul>
					<!-- /BUTTONS -->

					<!-- Logo -->
					<a class="logo float-left page-scroll" href="<?= site_url();?>">
						<img src="<?= base_url('asset/logo-agm/logo.png');?>" alt="" />
					</a>
					<div class="navbar-collapse collapse nav-main-collapse">
						<nav class="nav-main text-center">
							<ul id="topMain" class="nav nav-pills nav-main text-center">
                <?php if($this->session->userdata('uType') == 3): ?>
                      <li><a class="page-scroll" href="<?= site_url('home/store');?>">MY STORE</a></li>
                      <li><a class="page-scroll" href="#">INVOICE</a></li>
                      <li><a class="page-scroll" href="#">PRODUCT</a></li>

                <!-- This is navbar for admin -->
                <?php elseif($this->session->userdata('uType') == 4): ?>
                      <li><a class="page-scroll" href="<?= site_url('home/customer');?>">PROFILE</a></li>
                      <li><a class="page-scroll" href="#">PURCHASES</a></li>
								<?php else: ?>
									<!-- HOME -->
									<li><a class="page-scroll" href="#product">PRODUCT</a></li>
									<li><a class="page-scroll" href="#promotion">PROMOTION</a></li>
									<li><a class="page-scroll" href="#agmpedia">AGMPEDIA</a></li>
									<li><a class="page-scroll" href="#location">LOCATION</a></li>
	                <li><a class="page-scroll" href="!#">PARTNERSHIP</a></li>
                <?php endif; ?>
								<!-- This is navbar logout or login -->
		            <?php if($this->session->userdata('isLogin', TRUE)): ?>
		              <li><a class="page-scroll" href="<?= site_url('auth/logout');?>">LOGOUT</a></li>
		            <?php else: ?>
		              <li><a class="page-scroll" href="<?= site_url('auth/login');?>">LOGIN</a></li>
		            <?php endif; ?>
							</ul>
						</nav>
					</div>

				</div>
			</header>
			<!-- /Top Nav -->
		</div>
