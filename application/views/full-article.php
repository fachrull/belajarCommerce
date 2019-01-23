<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-xs">
			<div class="container">

				<h1>BLOG</h1>

				<!-- breadcrumbs -->
				<!-- <ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Blog</a></li>
					<li class="active">Single</li>
				</ol> -->
				<!-- /breadcrumbs -->

			</div>
		</section>
		<!-- /PAGE HEADER -->

		<!-- -->
		<section class="page-header page-header-md">
			<div class="container">

				<div class="row">

					<!-- LEFT -->
					<div class="col-md-3 col-sm-3">

						<!-- INLINE SEARCH -->
						<div class="inline-search clearfix mb-30">
							<form action="#" method="get" class="widget_search">
								<input type="search" placeholder="Start Searching..." id="s" name="s" class="serch-input">
								<button type="submit">
									<i class="fa fa-search"></i>
								</button>
							</form>
						</div>
						<!-- /INLINE SEARCH -->

						<hr />

						<!-- side navigation -->
						<div class="side-nav mb-60 mt-30">

							<div class="side-nav-head" data-toggle="collapse" data-target="#categories">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>CATEGORIES</h4>
							</div>
							<ul id="categories" class="list-group list-group-bordered list-group-noicon uppercase">
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(12)</span> LOREM</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(8)</span> LOREM</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(32)</span> LOREM</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(16)</span> LOREM</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(2)</span> LOREM</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(1)</span> LOREM</a></li>

							</ul>
							<!-- /side navigation -->


						</div>


						<!-- JUSTIFIED TAB -->
						<div class="tabs mt-0 hidden-xs-down mb-60">

							<!-- tabs -->
							<ul class="nav nav-tabs nav-bottom-border nav-justified">
								<li class="nav-item">
									<a class="nav-item active" href="#tab_1" data-toggle="tab">
										Popular
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-item" href="#tab_2" data-toggle="tab">
										Recent
									</a>
								</li>
							</ul>

							<!-- tabs content -->
							<div class="tab-content mb-60 mt-30">

								<!-- POPULAR -->
								<div id="tab_1" class="tab-pane active">

									<div class="row tab-post">
										<!-- post -->
										<div class="col-md-3 col-sm-3 col-xs-3">
											<a href="<?= site_url('home/fullArticle/#');?>">
												<img src="<?= site_url('statis/agm-customer/assets/content-images/slider-1-100x100.png');?>" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-xs-9">
											<a href="<?= site_url('home/fullArticle/#');?>" class="tab-post-link">Maecenas metus nulla</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

									<div class="row tab-post">
										<!-- post -->
										<div class="col-md-3 col-sm-3 col-xs-3">
											<a href="<?= site_url('home/fullArticle/#');?>">
												<img src="<?= site_url('statis/agm-customer/assets/content-images/slider-1-100x100.png');?>" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-xs-9">
											<a href="<?= site_url('home/fullArticle/#');?>" class="tab-post-link">Curabitur pellentesque neque eget diam</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

									<div class="row tab-post">
										<!-- post -->
										<div class="col-md-3 col-sm-3 col-xs-3">
											<a href="<?= site_url('home/fullArticle/#');?>">
												<img src="<?= site_url('statis/agm-customer/assets/content-images/slider-1-100x100.png');?>" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-xs-9">
											<a href="<?= site_url('home/fullArticle/#');?>" class="tab-post-link">Nam et lacus neque. Ut enim massa, sodales</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

								</div>
								<!-- /POPULAR -->


								<!-- RECENT -->
								<div id="tab_2" class="tab-pane">

									<div class="row tab-post">
										<!-- post -->
										<div class="col-md-3 col-sm-3 col-xs-3">
											<a href="<?= site_url('home/fullArticle/#');?>">
												<img src="<?= site_url('statis/agm-customer/assets/content-images/slider-1-100x100.png');?>" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-xs-9">
											<a href="<?= site_url('home/fullArticle/#');?>" class="tab-post-link">Curabitur pellentesque neque eget diam</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

									<div class="row tab-post">
										<!-- post -->
										<div class="col-md-3 col-sm-3 col-xs-3">
											<a href="<?= site_url('home/fullArticle/#');?>">
												<img src="<?= site_url('statis/agm-customer/assets/content-images/slider-1-100x100.png');?>" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-xs-9">
											<a href="<?= site_url('home/fullArticle/#');?>" class="tab-post-link">Maecenas metus nulla</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

									<div class="row tab-post">
										<!-- post -->
										<div class="col-md-3 col-sm-3 col-xs-3">
											<a href="<?= site_url('home/fullArticle/#');?>">
												<img src="<?= site_url('statis/agm-customer/assets/content-images/slider-1-100x100.png');?>" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-xs-9">
											<a href="<?= site_url('home/fullArticle/#');?>" class="tab-post-link">Quisque ut nulla at nunc</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->
								</div>
								<!-- /RECENT -->

							</div>

						</div>
						<!-- JUSTIFIED TAB -->


						<!-- TAGS -->
						<h3 class="hidden-xs-down fs-16 mb-20">TAGS</h3>
						<div class="hidden-xs-down mb-60">

							<a class="tag" href="#">
								<span class="txt">LIFESTYLE</span>
								<span class="num">12</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">LIFESTYLE</span>
								<span class="num">3</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">LIFESTYLE</span>
								<span class="num">1</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">LIFESTYLE</span>
								<span class="num">28</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">LIFESTYLE</span>
								<span class="num">6</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">LIFESTYLE</span>
								<span class="num">3</span>
							</a>

						</div>

					</div>


					<!-- RIGHT -->
					<div class="col-md-9 col-sm-9">

						<h1 class="blog-post-title"><?= strtoupper($pedia['title']);?></h1>
						<ul class="blog-post-info list-inline">
							<li>
								<a href="#">
									<i class="fa fa-clock-o"></i>
									<span class="font-lato"><?= $pedia['date'];?></span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-comment-o"></i>
									<span class="font-lato">28 Comments</span>
								</a>
							</li>
							<li>
								<i class="fa fa-folder-open-o"></i>

								<a class="category" href="#">
									<span class="font-lato">Design</span>
								</a>
								<a class="category" href="#">
									<span class="font-lato">Photography</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-user"></i>
									<span class="font-lato">John Doe</span>
								</a>
							</li>
						</ul>

						<!-- IMAGE -->
						<figure class="mb-20">
							<img class="img-fluid" src="<?= site_url('asset/upload/pedia/'.$pedia['photo']);?>" alt="img" />
						</figure>
						<!-- /IMAGE -->

						<!-- VIDEO -->
						<!--
							<div class="mb-20 embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/8408210" width="800" height="450"></iframe>
							</div>
							-->
						<!-- /VIDEO -->


						<!-- article content -->
						<p class="dropcap left">
							<?= $pedia['content']?>
						</p>
						<!-- /article content -->


						<div class="divider divider-dotted">
							<!-- divider -->
						</div>

						<!-- SHARE POST -->
						<div class="clearfix mt-30">


							<span class="float-left mt-6 bold hidden-xs-down">
								Share Post :
							</span>

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

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-pinterest float-left" data-toggle="tooltip"
							 data-placement="top" title="Pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-call float-left" data-toggle="tooltip"
							 data-placement="top" title="Email">
								<i class="icon-email3"></i>
								<i class="icon-email3"></i>
							</a>

						</div>
						<!-- /SHARE POST -->


						<div class="divider">
							<!-- divider -->
						</div>


						<ul class="pager">
							<li class="previous"><a class="b-0" href="#">&larr; Previous Post</a></li>
							<li class="next"><a class="b-0" href="#">Next Post &rarr;</a></li>
						</ul>


						<div class="divider">
							<!-- divider -->
						</div>

					</div>

				</div>


			</div>
		</section>
		<!-- / -->
